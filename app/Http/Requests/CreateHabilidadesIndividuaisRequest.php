<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MustBeEnumHabilidadesEnum;

class CreateHabilidadesIndividuaisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'aluno_id' => 'required|exists:alunos,id',
            'coordenacao_motora_grossa' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'coordenacao_motora_fina' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'equilibrio' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'lateralidade' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'orientacao_espacial' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'esquema_corporal' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_visual' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_auditiva' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_tatil' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'integracao_sensorial' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'processamento_sensorial' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'discriminacao_sensorial' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'interacao_pares' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'interacao_adultos' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'participacao_grupos' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'cooperacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'empatia' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'resolucao_conflitos' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'autoregulacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'atencao_concentracao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'segmento_regras' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'flexibilidade' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'controle_impulsos' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'tolerancia_frustacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'compreensao_verbal' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'expressao_verbal' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'comunicacao_nao_verbal' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'vocabulario' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'estrutura_linguagem' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'comunicacao_funcional' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'resolucao_problemas' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'pensamento_abstrato' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'sequenciacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'classificacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'comparacao' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'causa_efeito' => ['nullable', 'string', new MustBeEnumHabilidadesEnum()],
            'observacoes_gerais' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            '*.string' => 'O campo :attribute deve ser uma string.',
        ];
    }
}
