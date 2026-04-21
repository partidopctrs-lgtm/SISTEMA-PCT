<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Confirmação de e-mail</title>
</head>
<body style="margin:0;padding:0;background:#f0f4fa;font-family:Arial,Helvetica,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0f4fa;">
<tr><td align="center" style="padding:30px 10px;">
<table width="620" cellpadding="0" cellspacing="0" border="0" style="max-width:620px;width:100%;background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 4px 24px rgba(13,45,107,0.13);">

<!-- FAIXA TOPO -->
<tr><td style="padding:0;line-height:0;">
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
<td width="33%" height="6" style="background:#0d2d6b;font-size:0;">&nbsp;</td>
<td width="34%" height="6" style="background:#f0c040;font-size:0;">&nbsp;</td>
<td width="33%" height="6" style="background:#2a8a40;font-size:0;">&nbsp;</td>
</tr></table></td></tr>

<!-- HEADER COM LOGO -->
<tr><td style="background:#0d2d6b;padding:28px 40px 22px;text-align:center;">
<img src="https://pct.social.br/logo.png" alt="PCT" width="170" style="display:block;margin:0 auto;max-width:170px;">
</td></tr>

<!-- FAIXA DOURADA -->
<tr><td style="background:#f0c040;height:4px;font-size:0;">&nbsp;</td></tr>

<!-- CORPO -->
<tr><td style="padding:36px 40px 28px;">
<h1 style='margin:0 0 18px;font-size:22px;font-weight:bold;color:#0d2d6b;line-height:1.3;'>Confirme seu endereço de e-mail</h1>
<p style='margin:0 0 14px;font-size:15px;color:#333;line-height:1.7;'>Olá, <strong>{{ $user->name }}</strong>! Para ativar sua conta no <strong>Movimento PCT</strong>, precisamos confirmar que este e-mail é seu.</p>
<div style='background:#e8f0fe;border-left:4px solid #0d2d6b;border-radius:6px;padding:14px 18px;margin:18px 0;font-size:14px;color:#0d2d6b;line-height:1.6;'><strong>Clique no botão abaixo</strong> para confirmar seu e-mail e ativar seu acesso completo ao portal.</div>
<div style='text-align:center;margin:24px 0;'>
    <a href='{{ $url }}' style='display:inline-block;background:#2a8a40;color:#fff;font-size:15px;font-weight:bold;text-decoration:none;padding:14px 36px;border-radius:6px;'>Confirmar meu e-mail</a>
</div>
<div style='background:#fff8e1;border-left:4px solid #f0c040;border-radius:6px;padding:14px 18px;margin:18px 0;font-size:14px;color:#7a4f00;line-height:1.6;'>⚠️ Este link é válido por <strong>24 horas</strong>.</div>
<hr style='border:none;border-top:1px solid #e0e8f4;margin:22px 0;'>
<p style='margin:10px 0 0;font-size:11.5px;color:#999;line-height:1.6;'>Se você não criou uma conta no PCT, ignore este e-mail com segurança.</p>
</td></tr>

<!-- RODAPÉ -->
<tr><td style="background:#f0f4fa;border-top:2px solid #e0e8f4;padding:22px 40px 18px;text-align:center;">
<p style="margin:0 0 5px;font-size:12px;color:#1a3a6b;font-weight:bold;">PCT – Partido Cidadania e Trabalho</p>
<p style="margin:0 0 4px;font-size:11px;color:#666;">UNIR &bull; DEFENDER &bull; TRANSFORMAR</p>
<p style="margin:0 0 6px;font-size:10px;color:#999;">pct.social.br &nbsp;|&nbsp; movimento@pct.social.br</p>
</td></tr>

<!-- FAIXA RODAPÉ -->
<tr><td style="padding:0;line-height:0;">
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
<td width="33%" height="5" style="background:#0d2d6b;font-size:0;">&nbsp;</td>
<td width="34%" height="5" style="background:#f0c040;font-size:0;">&nbsp;</td>
<td width="33%" height="5" style="background:#2a8a40;font-size:0;">&nbsp;</td>
</tr></table></td></tr>

</table>
</td></tr>
</table>
</body></html>
