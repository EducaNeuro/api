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
            'coordenacao_motora_grossa' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'coordenacao_motora_fina' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'equilibrio' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'lateralidade' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'orientacao_espacial' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'esquema_corporal' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_visual' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_auditiva' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'percepcao_tatil' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'integracao_sensorial' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'processamento_sensorial' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'discriminacao_sensorial' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'interacao_pares' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'interacao_adultos' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'participacao_grupos' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'cooperacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'empatia' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'resolucao_conflitos' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'autoregulacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'atencao_concentracao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'segmento_regras' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'flexibilidade' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'controle_impulsos' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'tolerancia_frustacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'compreensao_verbal' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'expressao_verbal' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'comunicacao_nao_verbal' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'vocabulario' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'estrutura_linguagem' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'comunicacao_funcional' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'resolucao_problemas' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'pensamento_abstrato' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'sequenciacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'classificacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'comparacao' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'causa_efeito' => ['required', 'string', new MustBeEnumHabilidadesEnum()],
            'observacoes_gerais' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'O campo :attribute é obrigatório.',
            '*.string' => 'O campo :attribute deve ser uma string.',
        ];
    }
}
