<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\ApoioPartidoLog;
use Illuminate\Http\Request;

class ApoioPartidoController extends Controller
{
    /**
     * Salva a decisão do membro sobre apoio partidário.
     * Regras: nunca automático, sempre explícito, sempre reversível.
     */
    public function salvar(Request $request)
    {
        $request->validate([
            'decisao' => 'required|in:sim,nao,pular',
        ]);

        $user = auth()->user();

        if ($request->decisao === 'pular') {
            $user->update(['skipped_apoio_modal' => true]);
            return response()->json([
                'success' => true,
                'skip' => true,
                'mensagem' => 'Modal fechado.',
            ]);
        }

        $apoio = $request->decisao === 'sim';

        // Atualiza o usuário
        $user->update([
            'apoio_partido' => $apoio,
            'data_apoio'    => now(),
            'ip_apoio'      => $request->ip(),
            'skipped_apoio_modal' => true, // Também marca como pulado se escolheu
        ]);

        // Registra log de auditoria
        ApoioPartidoLog::create([
            'user_id'    => $user->id,
            'decisao'    => $apoio,
            'ip'         => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $mensagem = $apoio
            ? 'Seu apoio à formalização partidária foi registrado. Você pode alterar esta decisão a qualquer momento.'
            : 'Você optou por participar apenas do movimento. Sua decisão foi salva.';

        return response()->json([
            'success'  => true,
            'apoio'    => $apoio,
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * Altera a decisão existente (reversível a qualquer momento).
     */
    public function alterar(Request $request)
    {
        $request->validate([
            'decisao' => 'required|in:sim,nao',
        ]);

        $user  = auth()->user();
        $apoio = $request->decisao === 'sim';

        $user->update([
            'apoio_partido' => $apoio,
            'data_apoio'    => now(),
            'ip_apoio'      => $request->ip(),
        ]);

        ApoioPartidoLog::create([
            'user_id'    => $user->id,
            'decisao'    => $apoio,
            'ip'         => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $mensagem = $apoio
            ? 'Apoio à formalização partidária ativado.'
            : 'Você voltou para participação apenas no movimento.';

        return back()->with('success', $mensagem);
    }
}
