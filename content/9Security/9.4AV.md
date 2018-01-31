## Avaliação de vulnerabilidades

É muito comum encontrarmos definições e bibliografias em inglês que utilizem o termo "VA" Vulnerability Assessment ou Avaliação de Vulnerabilidades, a ideia por trás deste tipo de processo é avaliar e auditar um determinado ambiente, solução ou sistema utilizando ferramentas voltadas para tal finalidade, como por exemplo o Nessus, o Nikto ou o Arachni.

Muitas dessas ferramentas a primeira vista parecem simples e até são do ponto de vista de ux e usabilidades ( O Nessus é um belo exemplo disso ), porém a parte complicada está na mineração, análise e interpretação dos resultados apresentados; Configurações incorretas e mal uso tendem a levar a resultados inconclusivos cheios de falsos positivos, cabe ao auditor responsável pelo uso da ferramenta aseparar que o tipo de informação levantada realmente importa, identificando situações, configurações e exploits que possam levar ao comprometimento da informações e consquentemente do negócio.

---

## Falsos Positivos e Falsos Negativos

Uma etapa importante no uso de um VA para levantamento de vulnerabilidades é a análise do resultado obtido removendo possíveis falsos positivos ou falso negativos, falsos positivos são muito comuns no output de ferramentas de análise, eles referem-se a vulnerabilidades relataras como ativas no sistema mas que na realidade não existem ou já foram mitigadas utilizando um patch de atualizações por exemplo.

Já os chamados Falsos Negativos são na maioria das vezes mais complicados de se identificar e dependem diretamente do conhecimento técnico do Analista ou Developer responsável pelo processo de análise trata-se de situações e outputs que não foram relacionados a vulnerabilidades pela ferramenta usada, neste caso o uso de mais de uma ferramenta por exemplo permitirá um resultado mais acertivo.

> ***Importante:*** Falsos positivos e vulnerabilidades de baixo score ou difícil exploração são coisas diferentes, uma vulnerabilidade pode ser classificada como "Low" segundo o score da CVSS mas ainda assim continua sendo uma vulnerabilidade reportada uma vez que esteja ativa no sistema.

### Prova Conceito

Caso o responsável pelo teste possua acesso ao sistema, aplicação ou servidor no qual o VA executou o scan é interessante que as informacoes levantadas sejam cruzadas com a realidade do alvo ou seja, se possível testar a vulnerabilidade desde que isso não afete a aplicação ou preferencialmente atuando em janelas de manutenção.

---

## Como um VA classifica uma vulnerabilidade?

A maioria das ferramentas e frameworks de segurança utilizam algum modelo de ranking para classificação dos riscos encontrados, a título de padronização e para facilitar o endendimento usando uma linguagem comum temos o CVSS como principal recurso para esse processo de "ranking" ou "raiting".

### CVSS

O CVSS ou Common Vulnerability Scoring System é um sistema open source cuja função é classificar as vulnerabilidades conhecidas baseado nas características e no impacto de uma vulnerabilidade, a vantagem desse modelo é que sua atualização é constante, uma classificação pode mudar com base em um novo recurso explorado a partir dessa vulnerabilidades ou na quantidade de sistemas a serem afetados por exemplo.

O nessus por exemplo utiliza o CVSS como base na classificação que aparece em seu relatório, mais informações sobre isso podem ser obtidas diretamente no site do projeto [www.first.org/cvss](https://www.first.org/cvss/specification-document);

## CVE

Common Vulnerability and Exposures ( CVE ): O CVE é uma base de dados pública relativa a vulnerabilidades é exploits conhecidos e já documentados, cara vulnerabilidades relatada é assinada como um número único de identificacão, chamamos esse número de "CVE Number" ferramentas de análise como o Nessus e o W3af referenciam esse número ao gerar um relatório de vulnerabilidades. Esses relatórios podem ser consultados no [cve.mitre.org](http://cve.mitre.org).

## CWE

Common Weakness Enumeration ( CWE ): O CWE é conceitualmente similar ao CVE, trata-se de outra base de dados pública, só que referente a um dicionário com tipos de fraquezas/vulnerabilidades conhecidas, sua base de dados pode ser consultada em [cwe.mite.org](http://cwe.mite.org);

---

## Ciclo de Vida de uma Análise

Processo de Análise de Vulnerabilidades e Pentest possuem um Ciclo de Vida comum referente às fases que devem ser executadas é que vão desde da definição do escopo até a entrega do relatório do que fora executado.

Para execução de um uma Análise de Vulnerabilidades completa os seguintes passos são necessarios:

- 1 - Definição de Escopo;
- 2 - Levantamento de Informações;
- 3 - Varredura e Escaneamento;
- 4 - Análise de Falsos Positivos;
- 5 - Exploração de Vulnerabilidades ( Caso seja um pentest );
- 6 - Geração de Relatório e Report de Resultados;

A imagem abaixo ilustra esse processo de Análise:

![alt tag](https://raw.githubusercontent.com/wiki/helcorin/secdevops/images/lifecicle.png)


### FASE 1 - Definição de Escopo:

O primeiro passo da execução de uma Análise é identificar corretamente o Escopo da infraestrutura ou Sistema sobre a qual o processo será conduzido, no caso de plataformas de desenvolvimento e sistemas isso inclui verificação do tipo de sistema, linguagem utilizada, banco de dados, plataforma de hospedagem e ou publicação do conteúdo etc. O Escopo dependerá diretamente do objetivo de seu teste, ferramentas a serem utilizadas, data e horário de execução devem ser acordados, outro ponto importante é documentar o processo a ser executado e garantir que todas as partes envolvidas estão de acordo quando o teste a ser executado envolver elementos além de seu código / infraestrutura.

#### Testes do Tipo "BlackBox"

Existe uma modalidade específica de testes de invasão chamada ***BlackBox*** neste modelo apenas informações como endereço IP do alvo são oferecidas ao Analista ou Pentester esse tipo de teste não involve qualquer fornecimento de informações e tem a finalidade de similar o cenário encontrado por um atacante ao executar um pentest na plataforma envolvida.

#### Testes do Tipo "GreyBox"

Testes do tipo "GreyBox"  incluem algumas informações referentes ao alvo como a Versão de Software utilizada, configurações relevantes ou até mesmo credenciais de acesso, Essa abordagem é utilizada para obter relatórios mais completos e avaliar  Resiliência de um ambiente e a existência de Vulnerabilidades conhecidas.

### FASE 2 - Levantamento de Informações

A segunda fase de uma análise é o levantamento de informações, essa fase é essencial principalmente em testes no formato BlackBox onde inicialmente nenhuma informação foi fornecida, ela envolve desde questões simples como definição exata de quem é seu alvo ( o comando "whois" disponível em sistemas Linux é um bom começo  ), até identificacao exata das plataformas envolvidas, nesse ponto ferramentas de rede como o NMAP e o Telnet serão úteis, outras informações podem ser obtidas por scaners como o Nikto.

A informação obtida aqui será importante para redução do escopo definido inicialmente e escolha das ferramentas utilizadas na FASE 3 e na FASE 4.

### FASE 3 - Escaneamento de Vulnerabildiades

Essa fase inclui o processo de escaneamento em si e levantamento de vulnerabilidades encontradas, este processo envolve o uso de ferramentas definidas de acordo com as informações obtidas na fase anterior, como exemplo para esta disciplina utilizaremos Frameworks Opensource como o w3af e o Arachni e soluções proprietários como o Nessus, o retorno desse escaneamento também será a base para um pentester definir quais os exploits a serem utilizados contra seu alvo.

### FASE 4 - Analise de Falsos Positivos

Conforme descrito no material [na base deste conteúdo](https://github.com/2TINR/Sec/wiki/3.-VA---Vulnerability-Assessment), é comum que durante um processo de analise haja a ocorrencia de falsos positivos, uma vez que a ferramenta utilizada deve gerar o retorno baseado em sua base de dados e em seu modelo de classificação de riscos, esses elementos devem ser minerados e analisados pelo analista responsável pelo teste a fim de isolar dentro do relatório obtidos os elementos que realmente representem uma vulnerabildiade.

### FASE 5 - Exploração de Vulnerabilidades

Essa fase se aplica a processos de pentest e a situações onde será necessário apresentar uma prova conceito ao dono da aplicação esclarecendo o tipo de vulnerabilidade e como um atacante tomaria proveito disso.

### FASE 6 - Geração de Relatórios e Report de Resultados;

Após execução da Analise é necessário a geração de uma relatório final contendo o detalhamento técnico do processo, esse relatório deverá inglobar alguns itens conforme descrito abaixo:

- O escopo da avaliação, itens abordados, alvos e objetivos; 
- A gestão/resumo do processo executado;
- Uma sinopse das falhas descobertas com a severidade do risco relacionado;
- Detalhamento sobre cada falha e seu respectivo impacto;
- Recomendações para corrigir a vulnerabilidade;

---

## Material de Referência:

Boa parte da base teórica descrita acima foi baseada nos primeiros capitulos do livro Learning Nessus for Penetration Testing do autor Himanshu Kumar publicado pela PUCKT

* [Nessus for Penetration Testing By Himanshu Kumar](https://www.packtpub.com/networking-and-servers/learning-nessus-penetration-testing)

---

**Free Software, Hell Yeah!**
