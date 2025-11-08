<?php

namespace App\Services;

use App\Repositories\AlunosRepository;
use App\Repositories\EducadoresRepository;
use App\Repositories\EntrevistaFamiliarRepository;
use App\Repositories\HabilidadesRepository;
use App\Repositories\InventarioHabilidadesRepository;
use App\Repositories\MetasRepository;
use App\Repositories\OrientacoesPedagogicasRepository;
use App\Repositories\PlanejamentoRepository;
use App\Repositories\RegistroPedagogicoRepository;

class DashboardService
{
    public function __construct(
        private readonly AlunosRepository $alunosRepository,
        private readonly EducadoresRepository $educadoresRepository,
        private readonly InventarioHabilidadesRepository $inventarioHabilidadesRepository,
        private readonly HabilidadesRepository $habilidadesRepository,
        private readonly OrientacoesPedagogicasRepository $orientacoesPedagogicasRepository,
        private readonly MetasRepository $metasRepository,
        private readonly PlanejamentoRepository $planejamentoRepository,
        private readonly RegistroPedagogicoRepository $registroPedagogicoRepository,
        private readonly EntrevistaFamiliarRepository $entrevistaFamiliarRepository,
    ) {
    }
    /**
     * Retorna estatísticas gerais do sistema
     */
    public function getStatistics(): array
    {
        return [
            'pdis' => $this->getPdiStatistics(),
            'total_alunos' => $this->getTotalAlunos(),
            'total_educadores' => $this->getTotalEducadores(),
        ];
    }

    /**
     * Estatísticas de PDIs (Plano de Desenvolvimento Individual)
     */
    private function getPdiStatistics(): array
    {
        return [
            'alunos_com_pdi' => $this->alunosRepository->countComPdi(),
            'total_inventario_habilidades' => $this->inventarioHabilidadesRepository->count(),
            'total_habilidades' => $this->habilidadesRepository->count(),
            'total_orientacoes_pedagogicas' => $this->orientacoesPedagogicasRepository->count(),
            'total_metas' => $this->metasRepository->count(),
            'total_planejamentos' => $this->planejamentoRepository->count(),
            'total_registros_pedagogicos' => $this->registroPedagogicoRepository->count(),
            'total_entrevistas_familiares' => $this->entrevistaFamiliarRepository->count(),
        ];
    }

    /**
     * Total de alunos cadastrados
     */
    private function getTotalAlunos(): int
    {
        return $this->alunosRepository->count();
    }

    /**
     * Total de educadores cadastrados
     */
    private function getTotalEducadores(): int
    {
        return $this->educadoresRepository->count();
    }
}
