<?php

namespace App\Services;

use App\Models\Anexo;
use App\Repositories\AnexosRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnexosService
{
    private const DEFAULT_DIRECTORY = 'anexos';

    public function __construct(private readonly AnexosRepository $anexosRepository) {}

    public function all()
    {
        return $this->anexosRepository->all();
    }

    public function find(int $id): Anexo
    {
        return $this->anexosRepository->findOrFail($id);
    }

    public function create(array $data, ?UploadedFile $file = null): Anexo
    {
        $existing = null;

        if (! empty($data['id'])) {
            $existing = $this->anexosRepository->findOrFail((int) $data['id']);
        }

        if ($file) {
            if ($existing) {
                $this->deleteFileByUrl($existing->url);
            }

            $upload = $this->uploadFile($file);
            $data['url'] = $upload['url'];
        } elseif ($existing) {
            $data['url'] = $existing->url;
        }

        return $this->anexosRepository->create([
            'id' => $data['id'] ?? null,
            'url' => $data['url'] ?? $existing?->url,
            'observacao' => $data['observacao'] ?? null,
        ]);
    }

    public function update(int $id, array $data, ?UploadedFile $file = null): Anexo
    {
        $anexo = $this->anexosRepository->findOrFail($id);

        if ($file) {
            $this->deleteFileByUrl($anexo->url);
            $upload = $this->uploadFile($file);

            $data['url'] = $upload['url'];
        }

        $payload = array_filter([
            'url' => $data['url'] ?? null,
            'observacao' => $data['observacao'] ?? null,
        ], static fn ($value) => $value !== null);

        return $this->anexosRepository->update($anexo, $payload);
    }

    public function delete(int $id): void
    {
        $anexo = $this->anexosRepository->findOrFail($id);
        $this->deleteFileByUrl($anexo->url);
        $this->anexosRepository->delete($anexo);
    }

    private function uploadFile(UploadedFile $file): array
    {
        $diskName = $this->diskName();
        $disk = Storage::disk($diskName);

        $filename = Str::uuid()->toString();
        $extension = $file->getClientOriginalExtension();
        if ($extension) {
            $filename .= '.' . $extension;
        }

        $path = $disk->putFileAs(
            self::DEFAULT_DIRECTORY,
            $file,
            $filename
        );

        $url = $this->resolveUrl($diskName, $path);

        return [
            'url' => $url ?? $this->buildFallbackUrl($diskName, $path),
            'path' => $path,
        ];
    }

    private function deleteFileByUrl(?string $url): void
    {
        if (! $url) {
            return;
        }

        $diskName = $this->diskName();
        $path = $this->extractPathFromUrl($url);

        if (! $path) {
            return;
        }

        $disk = Storage::disk($diskName);

        if ($disk->exists($path)) {
            $disk->delete($path);
        }
    }

    private function resolveUrl(string $diskName, string $path): ?string
    {
        $disk = Storage::disk($diskName);

        try {
            return $disk->url($path);
        } catch (\Throwable) {
            $baseUrl = config("filesystems.disks.$diskName.url");
            if ($baseUrl) {
                return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
            }
        }

        return null;
    }

    private function buildFallbackUrl(string $diskName, string $path): string
    {
        $baseUrl = config("filesystems.disks.$diskName.url");

        if ($baseUrl) {
            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        }

        return $path;
    }

    private function extractPathFromUrl(string $url): ?string
    {
        $diskName = $this->diskName();
        $baseUrl = rtrim((string) config("filesystems.disks.$diskName.url"), '/');

        if ($baseUrl && str_starts_with($url, $baseUrl)) {
            return ltrim(substr($url, strlen($baseUrl)), '/');
        }

        $parsed = parse_url($url, PHP_URL_PATH);

        return $parsed ? ltrim($parsed, '/') : null;
    }

    private function diskName(): string
    {
        return config('filesystems.cloud', 'supabase');
    }
}
