<?php

namespace App\Services;

use App\Models\Meta;
use App\Repositories\MetasRepository;

class MetasService
{
    public function __construct(private readonly MetasRepository $metasRepository) {}

    public function all()
    {
        return $this->metasRepository->all();
    }

    public function create(array $data): Meta
    {
        return $this->metasRepository->create($data);
    }

    public function find(int $id): Meta
    {
        return $this->metasRepository->findOrFail($id);
    }

    public function update(int $id, array $data): Meta
    {
        $meta = $this->metasRepository->findOrFail($id);

        return $this->metasRepository->update($meta, $data);
    }

    public function delete(int $id): void
    {
        $meta = $this->metasRepository->findOrFail($id);
        $this->metasRepository->delete($meta);
    }
}
