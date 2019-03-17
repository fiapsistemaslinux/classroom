!SLIDE inverse center transition=fade

<img src="../_images/rsz_fiap-logo.png" alt="Fiap Logo">

<h2 style="color:white;">Identificando "Anti-Patterns"</h2>

!SLIDE incremental transition=scrollUp

!SLIDE incremental transition=fade

# Situação Problema

O trecho que segue é uma adpatação de um cenário descrito no Livro "The Phoenix Project";

1. Leia atentamente o cenário descrito;
2. Discuta a situação descvrita entre os componentes do grupo;
3. Com base nas 4 hipóteses escolha aquela que na opinião do grupo **melhor descreve** uma possível causa raiz para o problema;
4. Adicione a resposta no questionário enviado para análise e comparação do que fora definido como causa por cada grupo;

!SLIDE incremental transition=fade

# Situação Problema

**Primeiro contato (como a falha foi relatada):**


<html>
<head>
	<title></title>
	<link href="https://svc.webspellchecker.net/spellcheck31/lf/scayt3/ckscayt/css/wsc.css" rel="stylesheet" type="text/css" />
</head>
<body aria-readonly="false">From: Dick Landry<br />
To: Steve Masters<br />
Date: September 4, 8:27 AM<br />
Priority: Highest<br />
Subject: Sistema de pagamentos indispon&iacute;vel<br />
&nbsp;<br />
Oi, Steve.<br />
&nbsp;<br />
N&oacute;s estamos enfrentando uma s&eacute;ria falha no funcionamento do sistema de pagamentos, ainda estamos avaliando o problema, aparentemente algo com os n&uacute;meros exibidos no sistema atualmente que segundo o pessoal do financeiro est&atilde;o &quot;inconsistentes&quot; consequentemente centenas de colaboradores possuem ordens de pagamentos represadas o que impede o c&aacute;lculo do que deve ser pago &agrave; quem e quando, com isso estamos correndo o risco de n&atilde;o termos nossos colaboradores sendo pagos, precisamos corrigir isso at&eacute; a pr&oacute;xima sexta feira, dia 05 antes que a janela de pagamentos feche.<br />
&nbsp;<br />
ATT</body>
</html>


!SLIDE incremental transition=fade

# Situação Problema

**Descrição do Problema (Perspectiva do especialista do coordenador de RH):**

<i>
Na execução do programa de ERP responsável pela geração da folha de pagamento ontem, todos os registros dos funcionários referentes a horas trabalhadas desapareceram. Temos certeza de que é um problema de TI. Essa confusão está nos impedindo de pagar nossos funcionários, violando inúmeras leis trabalhistas estaduais”.
</i>

!SLIDE incremental transition=fade

# Situação Problema

**Descrição do Problema (Perspectiva do Usuário da Plataforma):**

<i>Vamos começar com o fluxo de informações:<br />Nosso sistema financeiro obtém dados de folha de pagamento de todas as nossas várias divisões de diferentes maneiras. Nós acumulamos todos os números de horas trabalhadas e de hora em hora atualizamos esses dados, que incluem salários e impostos. Parece fácil, mas é extremamente complexo, porque cada estado tem diferentes tabelas de impostos, leis trabalhistas e assim por diante.</i>

<i>Para garantir que algo não estrague tudo, garantimos que os números resumidos correspondam aos números detalhados de cada divisão.</i>

<i>É um processo muito desajeitado e manual. Ele funciona na maior parte do tempo, mas ontem descobrimos que o upload dos dados não foi concluído. Todos os horários estavam preenchidos com zeros na relação entre horas trabalhadas e valor devido.</i>

<i>Isso nunca aconteceu antes. Não tenho ideia do que poderia ter causado o problema nenhuma mudança importante foi programada para esse período de pagamento;</i>

!SLIDE incremental transition=fade

# Situação Problema

**Hipótese 1: Falha na infraestrutura física**

.callout `Falha na plataforma de storage da empresa, essa plataforma é responsável por manter os dados que estão sendo consumidos pelo sistema de folha de pagamentos, no momento está sendo executado um "warroom" entre fornecedor e time de storage, este sistema fornece armazenamento centralizado para muitos sistemas mais críticos da empresa, até agora o único sistema afetado é o sistema de pagamento.`

**Hipótese 2: Atualização de S.O. nos servidores de pagamento**

.callout `Uma atualização de sistema operacional foi executada fora de horário, (ou seja, em janela) nos servidores do sistema de pagamento. Demorou mais do que esperado e quando o sistema foi reiniciado alguns testes começaram a falhar (todos de software, não existe testes de infraestrutura, pois estes são executados manualmente), sendo normalizados dentro de quinze minutos, aparentemente o sistema voltou a operar conforme esperado.`

!SLIDE incremental transition=fade

# Situação Problema

**Hipótese 3: Release liberada pelo time de desenvolvimento**

.callout `Patch de alteração na plataforma, a equipe de desenvolvimento entregou uma nova feature em um dos sistemas de apoio ao sistema de pagamento, a entrega foi agendada via CAB* e entregue pelo time de desenvolvimento diretamente no sistema em produção um dia antes da falha no sistema de processamento de pagamentos;`

 *CAB: Commit Advisory Border - Essencialmente o que chamamos de comitês de aprovação de mudanças; 

**Hipótese 4: Mitigação aplicada pelo time de segurança**

.callout `Instalação de um patch de segurança, a instalação ocorreu na noite que antecedeu o primeiro report de falha, o time responsável entregou a atualização sem passar pelo processo de CAB segundo orientações de seu próprio coordenador devido a criticidade e urgência da operação, a alteração consistiu em implementar um token para omitir campos considerados sigilosos e relatados como vulneráveis após um relatório de auditoria.`

!SLIDE incremental transition=fade

# Situação Problema

Questionário: [https://pt.surveymonkey.com/r/J283Q78](https://pt.surveymonkey.com/r/J283Q78)

![quest](images/QR_code_J283Q78.png)

!SLIDE incremental transition=fade

# Como estou dirigindo?

Existe uma grande dificuldade em avaliar estágios e maturidade de implantação em processos de desenvolvimento ágil e cultura DevOps, para isso existe um modelo de questionário desenvolvido pela Atlassian, embora superficial ele consegue entregar alguma noção sobre pontos chaves a serem avaliados:

[DevOps Maturity Model](https://www.atlassian.com/devops/maturity-model)