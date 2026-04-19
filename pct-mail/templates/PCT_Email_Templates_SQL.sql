-- =====================================================
-- PCT - Email Templates Seeds
-- Total: 103 templates
-- Gerado em: 2025-01-01
-- =====================================================

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `slug` VARCHAR(100) NOT NULL UNIQUE,
  `nome` VARCHAR(200) NOT NULL,
  `categoria` VARCHAR(80) NOT NULL,
  `assunto` VARCHAR(300) NOT NULL,
  `corpo_html` LONGTEXT NOT NULL,
  `corpo_texto` TEXT DEFAULT NULL,
  `descricao` TEXT DEFAULT NULL,
  `ativo` TINYINT(1) DEFAULT 1,
  `visivel_para_usuario` TINYINT(1) DEFAULT 1,
  `criado_por` INT UNSIGNED DEFAULT NULL,
  `atualizado_por` INT UNSIGNED DEFAULT NULL,
  `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `atualizado_em` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_categoria` (`categoria`),
  INDEX `idx_ativo` (`ativo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `email_templates` (`slug`,`nome`,`categoria`,`assunto`,`ativo`,`visivel_para_usuario`,`criado_em`) VALUES
  ('auth_welcome','Boas-vindas ao sistema','autenticacao','Bem-vindo(a) ao PCT, {{nome}}!',1,1,NOW()),
  ('auth_email_verification','Confirmação de e-mail','autenticacao','Confirme seu e-mail – PCT',1,1,NOW()),
  ('auth_account_activated','Conta ativada','autenticacao','Sua conta PCT está ativa, {{nome}}!',1,1,NOW()),
  ('auth_password_reset_request','Redefinição de senha solicitada','autenticacao','Redefinição de senha solicitada – PCT',1,1,NOW()),
  ('auth_password_reset_success','Senha redefinida com sucesso','autenticacao','Sua senha PCT foi redefinida com sucesso',1,1,NOW()),
  ('auth_password_changed','Alteração de senha confirmada','autenticacao','Senha da sua conta PCT foi alterada',1,1,NOW()),
  ('auth_login_alert','Novo login detectado','autenticacao','Novo acesso detectado na sua conta PCT',1,1,NOW()),
  ('auth_login_suspicious','Login suspeito detectado','autenticacao','🚨 Atividade suspeita detectada – PCT',1,1,NOW()),
  ('auth_account_locked','Conta bloqueada','autenticacao','Sua conta PCT foi bloqueada temporariamente',1,1,NOW()),
  ('auth_account_unlocked','Conta desbloqueada','autenticacao','Sua conta PCT foi desbloqueada',1,1,NOW()),
  ('filiacao_recebida','Filiação recebida','filiacao','Recebemos sua solicitação de filiação ao PCT, {{nome}}',1,1,NOW()),
  ('filiacao_aprovada','Filiação aprovada','filiacao','🎉 Sua filiação ao PCT foi aprovada, {{nome}}!',1,1,NOW()),
  ('filiacao_rejeitada','Filiação rejeitada','filiacao','Atualização sobre sua solicitação de filiação – PCT',1,1,NOW()),
  ('filiacao_pendente','Filiação pendente','filiacao','Sua filiação PCT precisa de atenção, {{nome}}',1,1,NOW()),
  ('filiacao_termo_aceito','Termo de filiação aceito','filiacao','Termo de filiação aceito – PCT',1,1,NOW()),
  ('filiacao_documento_pendente','Documento pendente na filiação','filiacao','Documento necessário para sua filiação PCT',1,1,NOW()),
  ('apoio_registrado','Apoio registrado','apoio_partido','✅ Seu apoio ao PCT foi registrado, {{nome}}!',1,1,NOW()),
  ('apoio_ficha_envio','Envio da ficha de apoio','apoio_partido','📋 Sua ficha de apoio ao PCT está pronta!',1,1,NOW()),
  ('apoio_lembrete_assinatura','Lembrete para assinar ficha','apoio_partido','⏰ Lembrete: sua ficha de apoio ainda não foi assinada',1,1,NOW()),
  ('apoio_ficha_reenviar','Reenvio da ficha de apoio','apoio_partido','📋 Reenviando sua ficha de apoio ao PCT',1,1,NOW()),
  ('apoio_confirmado','Apoio validado','apoio_partido','✅ Seu apoio ao PCT foi validado oficialmente!',1,1,NOW()),
  ('apoio_rejeitado','Apoio inválido','apoio_partido','⚠️ Problema identificado no seu apoio ao PCT',1,1,NOW()),
  ('apoio_dados_inconsistentes','Problema nos dados do apoio','apoio_partido','⚠️ Dados inconsistentes no seu apoio – PCT',1,1,NOW()),
  ('apoio_meta_cidade_alerta','Cidade abaixo da meta','apoio_partido','⚠️ {{cidade}} está abaixo da meta de apoios ao PCT',1,1,NOW()),
  ('apoio_meta_cidade_batida','Meta da cidade atingida','apoio_partido','🎯 {{cidade}} atingiu a meta de apoios ao PCT!',1,1,NOW()),
  ('votacao_aberta','Nova votação aberta','votacao','🗳️ Nova votação disponível no PCT: {{titulo}}',1,1,NOW()),
  ('votacao_lembrete','Lembrete de votação','votacao','⏰ Lembrete: você ainda não votou em "{{titulo}}"',1,1,NOW()),
  ('votacao_encerrada','Votação encerrada','votacao','Votação encerrada: {{titulo}}',1,1,NOW()),
  ('votacao_resultado','Resultado da votação','votacao','📊 Resultado oficial da votação: {{titulo}}',1,1,NOW()),
  ('votacao_quorum_insuficiente','Quorum insuficiente','votacao','⚠️ Quorum insuficiente na votação: {{titulo}}',1,1,NOW()),
  ('eleicao_aberta','Eleição aberta','votacao','🗳️ Eleição interna aberta no PCT: {{titulo}}',1,1,NOW()),
  ('eleicao_resultado','Resultado da eleição','votacao','📊 Resultado oficial da eleição: {{titulo}}',1,1,NOW()),
  ('eleicao_posse','Posse confirmada','votacao','📌 Sua posse no cargo foi confirmada – PCT',1,1,NOW()),
  ('cargo_promocao_sugerida','Promoção sugerida','governanca','💡 Promoção de cargo sugerida para você – PCT',1,1,NOW()),
  ('cargo_promocao_aprovada','Promoção aprovada','governanca','🏅 Parabéns! Você foi promovido(a) no PCT',1,1,NOW()),
  ('cargo_promocao_rejeitada','Promoção rejeitada','governanca','Atualização sobre proposta de promoção – PCT',1,1,NOW()),
  ('cargo_nomeacao','Nomeação para cargo','governanca','📌 Você foi nomeado(a) para um cargo no PCT',1,1,NOW()),
  ('cargo_remocao','Remoção de cargo','governanca','Atualização de cargo no sistema PCT',1,1,NOW()),
  ('diretorio_novo_membro','Novo membro na cidade','diretorio','👤 Novo membro registrado em {{cidade}}',1,1,NOW()),
  ('diretorio_novo_apoio','Novo apoio registrado no diretório','diretorio','✅ Novo apoio registrado em {{cidade}}',1,1,NOW()),
  ('diretorio_meta_atualizada','Meta do diretório atualizada','diretorio','🎯 Meta do diretório atualizada – {{cidade}}',1,1,NOW()),
  ('diretorio_meta_baixa','Meta em risco','diretorio','⚠️ Meta em risco no diretório de {{cidade}}',1,1,NOW()),
  ('diretorio_meta_atingida','Meta do diretório atingida','diretorio','🎯 O diretório de {{cidade}} atingiu sua meta!',1,1,NOW()),
  ('diretorio_sem_atividade','Diretório inativo','diretorio','⚠️ O diretório de {{cidade}} está sem atividade',1,1,NOW()),
  ('diretorio_relatorio_disponivel','Relatório do diretório disponível','diretorio','📊 Relatório do diretório disponível – {{cidade}}',1,1,NOW()),
  ('tarefa_nova','Nova tarefa atribuída','tarefas','📝 Nova tarefa atribuída a você: {{titulo}}',1,1,NOW()),
  ('tarefa_prazo_proximo','Prazo de tarefa próximo','tarefas','⏰ Prazo se aproximando: {{titulo}}',1,1,NOW()),
  ('tarefa_atrasada','Tarefa atrasada','tarefas','🚨 Tarefa em atraso: {{titulo}}',1,1,NOW()),
  ('tarefa_concluida','Tarefa concluída','tarefas','✅ Tarefa concluída: {{titulo}}',1,1,NOW()),
  ('tarefa_cancelada','Tarefa cancelada','tarefas','❌ Tarefa cancelada: {{titulo}}',1,1,NOW()),
  ('demanda_nova','Nova demanda registrada','demandas','📣 Nova demanda registrada em {{cidade}}',1,1,NOW()),
  ('demanda_urgente','Demanda urgente','demandas','🚨 URGENTE: Nova demanda crítica em {{cidade}}',1,1,NOW()),
  ('demanda_encaminhada','Demanda encaminhada','demandas','📤 Demanda encaminhada: {{titulo}}',1,1,NOW()),
  ('demanda_resposta','Resposta à demanda','demandas','💬 Resposta recebida para sua demanda: {{titulo}}',1,1,NOW()),
  ('doc_criado','Documento criado','documentos','📄 Novo documento criado: {{titulo}}',1,1,NOW()),
  ('doc_em_revisao','Documento em revisão','documentos','🔍 Documento em revisão: {{titulo}}',1,1,NOW()),
  ('doc_aprovado','Documento aprovado','documentos','✅ Documento aprovado: {{titulo}}',1,1,NOW()),
  ('doc_rejeitado','Documento rejeitado','documentos','⚠️ Documento devolvido: {{titulo}}',1,1,NOW()),
  ('doc_juridico_pendente','Jurídico pendente','documentos','⚖️ Documento aguardando análise jurídica: {{titulo}}',1,1,NOW()),
  ('doc_assinatura_pendente','Assinatura pendente','documentos','✍️ Documento aguardando sua assinatura: {{titulo}}',1,1,NOW()),
  ('juridico_novo_documento','Novo documento para análise','juridico','⚖️ Novo documento para análise jurídica: {{titulo}}',1,1,NOW()),
  ('juridico_parecer_emitido','Parecer jurídico emitido','juridico','⚖️ Parecer jurídico emitido: {{titulo}}',1,1,NOW()),
  ('juridico_pendencia','Pendência jurídica','juridico','⚖️ Pendência jurídica: {{titulo}}',1,1,NOW()),
  ('juridico_aprovado','Documento validado pelo jurídico','juridico','✅ Documento validado pelo jurídico: {{titulo}}',1,1,NOW()),
  ('juridico_rejeitado','Documento recusado pelo jurídico','juridico','⚠️ Documento recusado pelo jurídico: {{titulo}}',1,1,NOW()),
  ('juridico_alerta_risco','Alerta de risco jurídico','juridico','🚨 ALERTA JURÍDICO: Risco identificado',1,1,NOW()),
  ('financeiro_receita','Receita registrada','financeiro','💰 Nova receita registrada no PCT',1,1,NOW()),
  ('financeiro_despesa','Despesa registrada','financeiro','💳 Nova despesa registrada no PCT',1,1,NOW()),
  ('financeiro_aprovacao','Aprovação financeira','financeiro','✅ Solicitação financeira aprovada – PCT',1,1,NOW()),
  ('financeiro_rejeicao','Rejeição financeira','financeiro','❌ Solicitação financeira rejeitada – PCT',1,1,NOW()),
  ('financeiro_relatorio','Relatório financeiro mensal','financeiro','💰 Relatório financeiro de {{mes}}/{{ano}} disponível',1,1,NOW()),
  ('financeiro_divergencia','Divergência financeira detectada','financeiro','🚨 Divergência financeira detectada – Ação necessária',1,1,NOW()),
  ('candidato_pre_cadastro','Pré-candidatura recebida','candidato','📋 Sua pré-candidatura ao PCT foi recebida, {{nome}}',1,1,NOW()),
  ('candidato_aprovado','Pré-candidatura aprovada','candidato','🎉 Sua pré-candidatura ao PCT foi aprovada, {{nome}}!',1,1,NOW()),
  ('candidato_rejeitado','Pré-candidatura rejeitada','candidato','Atualização sobre sua pré-candidatura – PCT',1,1,NOW()),
  ('candidato_documento_pendente','Documentos do candidato pendentes','candidato','📎 Documentos pendentes para sua candidatura – PCT',1,1,NOW()),
  ('candidato_avaliacao','Avaliação do candidato disponível','candidato','📊 Sua avaliação está disponível – PCT',1,1,NOW()),
  ('candidato_convocacao','Convocação interna do candidato','candidato','📌 Convocação: {{titulo}} – PCT',1,1,NOW()),
  ('campanha_disparo','Campanha enviada','comunicacao','📨 {{titulo}} – PCT',1,1,NOW()),
  ('campanha_agendada','Campanha agendada','comunicacao','📅 Campanha agendada: {{titulo}}',1,1,NOW()),
  ('campanha_resultado','Resultado da campanha','comunicacao','📊 Resultado da campanha: {{titulo}}',1,1,NOW()),
  ('comunicado_oficial','Comunicado oficial','comunicacao','📢 Comunicado Oficial PCT: {{titulo}}',1,1,NOW()),
  ('engajamento_pontos','Pontos ganhos','engajamento','🌟 Você ganhou {{pontos}} pontos no PCT!',1,1,NOW()),
  ('engajamento_nivel','Subida de nível','engajamento','🏆 Parabéns! Você subiu para o nível {{nivel}} no PCT!',1,1,NOW()),
  ('engajamento_ranking','Ranking atualizado','engajamento','📊 Ranking PCT atualizado – sua posição: #{{posicao}}',1,1,NOW()),
  ('engajamento_inatividade','Alerta de inatividade','engajamento','👋 Está tudo bem, {{nome}}? Sentimos sua falta no PCT!',1,1,NOW()),
  ('engajamento_bloqueio','Bloqueio por inatividade','engajamento','⚠️ Sua conta PCT foi suspensa por inatividade',1,1,NOW()),
  ('engajamento_reativacao','Conta reativada','engajamento','✅ Sua conta PCT foi reativada! Seja bem-vindo(a) de volta!',1,1,NOW()),
  ('suporte_ticket_aberto','Ticket aberto','suporte','🎫 Ticket #{{protocolo}} aberto – PCT Suporte',1,1,NOW()),
  ('suporte_ticket_resposta','Resposta ao ticket','suporte','💬 Resposta ao seu ticket #{{protocolo}} – PCT',1,1,NOW()),
  ('suporte_ticket_fechado','Ticket fechado','suporte','✅ Ticket #{{protocolo}} fechado – PCT',1,1,NOW()),
  ('admin_usuario_criado','Usuário criado pelo administrador','suporte','👤 Sua conta PCT foi criada pelo administrador',1,1,NOW()),
  ('admin_usuario_alterado','Alteração de usuário','suporte','⚙️ Alteração realizada na sua conta PCT',1,1,NOW()),
  ('admin_acao_critica','Ação crítica registrada','suporte','🚨 Ação crítica registrada no sistema PCT',1,1,NOW()),
  ('dev_servidor_offline','Servidor fora do ar','infraestrutura','🚨 [CRÍTICO] Servidor PCT offline!',1,1,NOW()),
  ('dev_cpu_alta','Uso alto de CPU','infraestrutura','⚠️ Uso crítico de CPU – Servidor PCT',1,1,NOW()),
  ('dev_memoria_alta','Uso alto de memória','infraestrutura','⚠️ Uso crítico de memória – Servidor PCT',1,1,NOW()),
  ('dev_disco_critico','Disco quase cheio','infraestrutura','🚨 Disco quase cheio – Servidor PCT',1,1,NOW()),
  ('dev_banco_indisponivel','Banco de dados indisponível','infraestrutura','🚨 [CRÍTICO] Banco de dados PCT indisponível!',1,1,NOW()),
  ('dev_ssl_expirando','SSL prestes a expirar','infraestrutura','⚠️ Certificado SSL expira em {{dias}} dias – PCT',1,1,NOW()),
  ('dev_backup_falhou','Backup falhou','infraestrutura','🚨 [CRÍTICO] Backup do PCT falhou!',1,1,NOW()),
  ('dev_backup_sucesso','Backup concluído','infraestrutura','✅ Backup PCT concluído com sucesso',1,1,NOW()),
  ('dev_seguranca_alerta','Tentativa de invasão','infraestrutura','🚨 [SEGURANÇA] Tentativa de invasão – PCT',1,1,NOW());

-- =====================================================
-- TABELA DE VARIÁVEIS DOS TEMPLATES
-- =====================================================
CREATE TABLE IF NOT EXISTS `email_template_variaveis` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `template_id` INT UNSIGNED NOT NULL,
  `nome_variavel` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255) DEFAULT NULL,
  `exemplo` VARCHAR(255) DEFAULT NULL,
  FOREIGN KEY (`template_id`) REFERENCES `email_templates`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- TABELA DE ENVIOS
-- =====================================================
CREATE TABLE IF NOT EXISTS `email_envios` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `template_id` INT UNSIGNED DEFAULT NULL,
  `destinatario_email` VARCHAR(255) NOT NULL,
  `destinatario_nome` VARCHAR(200) DEFAULT NULL,
  `assunto_final` VARCHAR(300) NOT NULL,
  `corpo_final` LONGTEXT NOT NULL,
  `status` ENUM('pendente','agendado','enviado','entregue','falhou','cancelado') DEFAULT 'pendente',
  `erro` TEXT DEFAULT NULL,
  `origem_envio` VARCHAR(100) DEFAULT NULL,
  `referencia_tipo` VARCHAR(100) DEFAULT NULL,
  `referencia_id` INT UNSIGNED DEFAULT NULL,
  `enviado_por` INT UNSIGNED DEFAULT NULL,
  `agendado_para` DATETIME DEFAULT NULL,
  `enviado_em` DATETIME DEFAULT NULL,
  `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status`),
  INDEX `idx_template` (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- FILA DE E-MAILS
-- =====================================================
CREATE TABLE IF NOT EXISTS `fila_emails` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `template_id` INT UNSIGNED DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(200) DEFAULT NULL,
  `assunto` VARCHAR(300) NOT NULL,
  `corpo` LONGTEXT NOT NULL,
  `status` ENUM('pendente','processando','enviado','falhou') DEFAULT 'pendente',
  `tentativas` TINYINT UNSIGNED DEFAULT 0,
  `ultima_tentativa_em` DATETIME DEFAULT NULL,
  `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- LOGS DE ENVIO
-- =====================================================
CREATE TABLE IF NOT EXISTS `email_logs` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `envio_id` INT UNSIGNED NOT NULL,
  `acao` VARCHAR(100) NOT NULL,
  `detalhes` TEXT DEFAULT NULL,
  `ip` VARCHAR(45) DEFAULT NULL,
  `criado_em` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_envio` (`envio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
