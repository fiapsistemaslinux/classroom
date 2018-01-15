# Gerenciamento de configurações

O termo **"Gerenciamento de Configuração" refere-se ao processo a partir do qual os componentes relevantes ao seu projeto e suas respectivas dependências são armazenadas, identificadas e modificadas,** essa lógica é amplamente usada na área de desenvolimento e automação, podendo ser aplicada em diversas esferas, no caso do desenvolvimento a maior prática relacionada ao gerenciamento de configuração seria o versionamento de código.

> Definir uma estratégia para gerenciamento de configuração é algo essencial para uma boa cultura de desenvolvimento, sendo a partir deste ponto que começaremos a pensar em questões como o fluxo para execução de mudanças, evolução e ciclo de desenvolvimento de aplicações além do modelo de colaboração e organização do time de desenvolvimento envolvido.


**Como saber se estamos no caminho certo?**

No livro Continuos Delivery Humble e Farley propõem três perguntas simples para determinar se você e seu time estão no caminho certo em relação a gerenciamento de configurações:

[Questionário: Como estou dirigindo(versionando)?](https://pt.surveymonkey.com/r/2C5NVQW)

É improvável que você consiga 5 corações para cada uma dessas perguntas mas isso nem mesmo é necessário, a idéia do questionário é expor alguns pontos importantes diretamente relacionados a gerenciamento de configuração e a cultura devops, Aliás boa parte das respostas sobre como conseguir os 5 corações para cada uma dessas questões será trabalhada neste conteúdo.

---

## Gerenciamento de Código (controle de Versões)

Quando o assunto é desenvolvimento ao considerar a visão e o foco dividido em vários projetos e quantidade de mãos atuando em uma mesma tarefa ou as etapas envolvidas é imperativo que se utilize algum modelo de repositório para armazenamento e gerenciamento de código, esses repositórios são o que chamamos de **repositórios de código**, o objetivo é armazenar seu trabalho em um local mais seguro e mais resiliente que um pen-drive, Uma vez que um bom modelo de versionamento de código seja utilizado ele deverá ser capaz de fornecer respostas para duas perguntas extremamente importantes:

***Quais componentes constituem uma versão específica de um software? E como poderemos reproduzir um estado particular destes binários bem como a configuração do software que existia no ambiente?***

***O que foi alterado e quando foi alterado, quem fez a alteração e qual foi o motivo?***

Essas duas perguntas poderiam ser enquadradas no questionário anterior, mas foram separadas por tratarem de uma questão específica sobre o gerencimaneto de configuração, o versionamento de código.

---

### Ferramentas de Controle de Versão

A maioria dos repositórios utiliza alguma arquitetura baseada em um centralizador, os mais antigos trabalhavam com servidores que faziam essa função utilizando protocolos como FTP, outros implementam tecnologias próprias e esquemas próprios para transporte e controle de dados baseando-se em protocolos como HTTPS e SSH eis alguns exemplos:

- [Git](https://git-scm.com/)
- [Marcurial](https://pypi.python.org/pypi/Mercurial)
- [Team Foundation Server](https://www.visualstudio.com/team-services/)
- [SVN](https://subversion.apache.org/)
- [CVS](https://sourceforge.net/p/mx4j/cvs/)

> A primeira ferramenta de controle de versão utilizada em grande escala foi a [SCCS](https://en.wikipedia.org/wiki/Source_Code_Control_System) (Source Code Control System) uma ferramenta proprietária desenvolvida para UNIX por volta de 1970, predecessores famosos foram tomando lugar como o [RCS](https://pt.wikipedia.org/wiki/Revision_Control_System) e o [CVS](https://pt.wikipedia.org/wiki/CVS) sendo que todas elas ainda são projetos ativos atualmente.

---

### O que exatamente deve ser versionado? ( Na verdade Tudo )

- Todo o código relativo a sua aplicação;
- Todos os scripts de configuração;
- Todo código de implementação interna ( O que chamamos de DSL ou domain-specific language );
- Todos os scripts utilizados para Build de imagens ( Dockerfile por exemplo );
- Todos os metadados ( Json, Yaml etc );
- Todos os scripts de Teste automatizados e TDDs;
- Toda a documentação e procedimentos de configuração ( Esta wiki é um exemplo );
- Todos os templates de modelos de "Infraestructure as a Code";
- Todos os templates utilizados em automação como (Cloudformation, Terraform ou Heat);
- Todos os schemas de Databases, configurações e definições de DNS e Firewall;
- ***Basicamente tudo mesmo...***

#### Na verdade quase tudo...

Existe uma tipo de componentes que gera alguma discussão sobre manter ou nçao sobre controle de versão, os **binários que compoẽm a aplicação**, particularmente neste conteúdo defenderemos que NÃO deve ser algo mantido sobre controle de versão por alguns razões gerais e outras baseadas na minha experiência pessoal com o assunto, A primeira delas é o tamanho, binários gerados com base em versões podem ocupar muito espeço e deifenrete do que ocorre com compiladores se proliferam bem rápido, (geralmente na mesma velocidade em que versionamos e liberamos releases). Além disso eles podem deixar os times preguiçosos pois se você possui todas as ferramentas e dependencias sobrte controle você deverá ser capaz de reproduzir esses binários. A única excessão talvez seja o gerencimanto de containers e o uso de registries mas isso só se enquadra no cenário de micro-serviços e não se trata exatamente de binários mas sim de [IAC](https://github.com/2TINsecdevops/aulas/blob/master/content/configuration-management/iac.md), outra possibilidade é optar por mantera um repositório de binários fazendo isso de forma inteligente com integração automática e modelos de retenção, ferramentas como o [Artifactory Jfrog](https://jfrog.com/open-source/) existem com esse exato propósito.

> ***Ser livre para deletar qualquer coisa:*** No livro Continuos Delivery Humble e Farley apontam uma vantagem interessante no controle de versão, a liberade para deletar coisas, o controle de versão permite que você seja agressivo em relação a exclusão de coisas que você não acha que precisa. Afinal se você tomar uma decisão errada, é fácil de corrigir recuperando o arquivo de uma configuração anterior tudo depende da ferramenta correta com o uso correto e da cultura do time. Com o controle de versão, você pode responder a pergunta "Devemos excluir este arquivo?" Com um "SIM!" sem medo de ser feliz; 

---

***E o escolhido foi o git!***

Além da abordagem geral reservei algum conteúdo específico para tratarmos sobre o git, a escolha foi feita com base no fato do git ser o mecanisco mais difundido e utilizado no processo de versionamento de código,

[Introdução ao uso do Git](https://github.com/2TINsecdevops/aulas/blob/master/content/configuration-management/git.md)

---

### Outros Pontos Importantes

***Mensagens de "Commits" Inteligentes***

Todo e qualquer sistema de versionamento possui um mecanismo a partir do qual é possível adicionar mensagens e informações descritivas ao commit, criar mensagens descritivas e que remetam ao que foi modificado facilita muito o processo de depuração de erros e até a documentação de seu projeto.

Um modelo interessante é o uso de mensagens em várias linhas ou parágrafos, onde a primeira linha ou paragrafo seria um resumo do que foi feito, como o titulo de uma redação e as outras linhas ou parágrafos adicionariam detalhes. Essa lógica faz sentido pois na mairoai das ferramtnas principalmente aquelas baseadas em git o primeiro parágrafo é exibido em destaque na interface da ferramentas de versionamento.

Você também pode incluir links para o identificar a task relacionada em sua ferramenta de gerenciamento de projetos como um quadro kanban ou scruem e quando existir o link para bug reportado, no caso de ferramentas de acionamento de chamados por exemplo.

Em muitas equipes administradores de sistema criam bloqueios em suas ferramentas de controle de versão, de modo a garantir que essas informações sejam adicionadas.

> Existem vários termos que vieram do inglês e não possuem uma tradução literal, pelo menos não uma que seja usual. Commit é uma caso, é muito comum ouvir entre os times de desenvolvimento o termo "commitar" referindo-se a atualização de repositórios remotos de acordo com as mudanças feitas em uma cópia local, iremos por esse caminho também, e o ponto a ser abordado aqui é a importãncia em commitar no repositório principal com frequência:

***"Commits" frequentes, tanto quanto possível***

Quando você executa o commit de código no repositório principal suas mudanças tornam-se disponíveis para todos os outros no time. Caso você possua algum modelo de integração contínua implementado (e você realmente deveria ter), suas mudanças também acabarão por dar origem a um processo de build, testes automatizados e quem sabe na entrada dessas mudanças em produção.

Por esse motivo é quase instintivo que façamos o contrário, deixemos os commits para o final de ciclos de desenvolvimento, o que pode querer dizer que suas alterações entraram a cada uma ou duas semanas, dai a ideia de agendamento de deliverys amplamente utilizada até hoje. Essa prática tende a ser desencorajada no cenário devops.

A abordagem recomandada é desenvolver e implementar de forma incremental, o commit regular proporcionará a longo prazo maior segurança e diminuirá os ciclos no processo de entrega de código, afinal uma nova feature só é realmente entregue quando quando colocada em produção gerando valor ao negócio. Isso também significará passar a se importar mais com a fase de testes e com a qualidade de suas entregas garantindo que falhas e bugs sejam enctrados imediatamente e reduzindo a complexidade dos deliverys, e o temido conflito no processo de merge. Essa lógica vale tanto para o código quanto para configurações e outras coisas mantidas sob controle via versionamento.

Testes automatizados são essenciais e sua execução obviamente deve ser feita antes do processo de commit. Logo você deverá ter como fazer isso de forma local, estamos falando de um conjunto de testes rápidos (menos de dez minutos) mas relativamente abrangentes, capazes de verificar se você não introduziu nenhuma falha capaz de quebrar o build ou algum tipo de regressão no que já foi feito.

>  Muitos servidores de integração contínua possuem um recurso chamado "pretested commit" que permite que você execute estes testes em um ambiente semelhante ao de produção antes de fazer o check-in.

---

## Gerenciamento de Informações (Configurações e Parametros de Execução)

Informações sobre configuração são utilizadas para manipular o comportamento de aplicações alterando parâmetros no processo de build ou mesmo na aplicação em produção, é responsabilidade do time definir quais opções de configuração devem estar disponíveis, como gerenciar essa opções durante o ciclo de vida da aplicação e como garantir a consistencia da configuração, e consequente dos componentes configurados, aplicativos etc.


***Quais configurações são responsabilidade do time de desenvolvimento?*** 

Todas que estiverem ao seu alcance, você não vai querer descobrir no momento de um delivery que a versão de Java no servidor de produção é diferente da versão defina na arquitetura do seu novo projeto, configurações relacionadas ao ambiente onde uma aplicação será executada (as chamadas configuraçẽos de ambiente ou environment) precisam ser tão bem definidas e controladas quanto o código em si. A concessão de acesso direto a configurações de banco de dados, parâmetros de uma plataforma um midleware ou em um servidor de web por exemplo garantirá que o time será capaz de testar suas aplicações o mais rápido possível e falhar na mesma velocidade se necessário, naturalmente este tipo de configurção NÃO deverá ser definida ou alterada manualmente uma ferramenta ou metodolgia para geenciamento deste tipo de dado sempre será necessário, o conceito aqui não é permitir que o desenvolvedor acesse quaisquer níveis de configurações e ambiente criticos, mas sim que ele tenha conhecimento dessas configurações e a capacidade de reproduzilas de alguma forma garantindo que o ambiente de testes seja fidedigno ao ambiente de produção. Um primeiro passo nessa direção é pensar no versionament o de configurações tratando isso da mesma forma que se trata o versionamento de código.

***Flexibilidade não quer dizer instabilidade***

A flexibilidade é um componente importante mas deve ser tratada com certo cuidado,um software de propósito único pode ser bom em exercer uma função, e ao mesmo tempo ser desprovido de qualquer possibilidade de mudança de comportamento ou parametrização de suas funções. Por outro lado aplicações podem ser concebidas para funcionar como uma linguagem de programação que você poderia usar para escrever um jogo, um servidor de aplicativos ou um sistema de controle de estoque neste caso o diferencial seria a flexibilidade é claro que a maioria das aplicações, no entanto, não está em nenhum desses extremos. Ao invés disso são projetados para um propósito específico, mas dentro dos limites dessa finalidade, eles geralmente terão algumas maneiras pelas quais seu comportamento pode ser modificado, acionando módulos de depuração, alterando senhas e usuparios de banco etc.

Considere que alguns tipos de mudança podem exigir o commit e alterações e o crivo por parte de testes de integração da a importância de versionar sua configuração. Outra abordagem possível é o uso de variaveis de ambiente e confoigurações alocadas em memória dentro de plataformas que permitam essa formato e forneçam meios para aplicar essas alterações sem indisponibilizar uma aplicação.

***Qual a maneira certa para gerenciar essas configurações?***

A manipulação de configurações pode ser feita em diversos pontos do projeto:

* Um processo build pode receber configurações via script ou parametrização de variaveis assim que iniciado;

* Softwares de impacotamento como o maven também podem ser responspaveis por esse processo;

* Ferramentas desenvolvidas para modelos baseados em micro-serviços como Mesos ou Kubernetes por exemplo facilitam muito esse processo por possuirem mecanismos especificos para suportar essas alterações.

A maneira como inserimos essas configurações também é uma decisão a ser tomada,configurações podem ser fornecidas na forma de variáveis de ambiente ou como argumentos para o comando usado para iniciar o sistema. Alternativamente, você pode usar os mesmos mecanismos como arquivos de configuração em memória ou serviços externos disponíveis via SOAP ou REST. Repositórios centralizados que permitam acesso e consulta de confogurações também são uma opção válida como RDBMS ou LDAP.

> É muito importante possuir que se possa configurar sua aplicação em tempo de execução ou durante o processo de deploy para que você possa informar onde dependencias como banco de dados, servidores de mensagens ou sistemas externos estão e como acessálas. No caso de um banco de dados por exemplo, você poderia passar os parâmetros de conexão do banco para a aplicação no momento do deploy.

Fechando a conta eis alguns conceitos interessante sobre como gerenciar sua configuração:

* Seja qual for o modelo utilizado procure SEMPRE executar a configuração de forma automatizada, utilize sempre convenções de nomeação claras evitando nomes obscuros ou confusos.

* Considere que alguém qualquer um que tenha o devido acesso, ao ler o arquivo de configuração sem um manual deverá ser capaz entender quais são as propriedades de configuração e o que deve ou não ser alterado.

* Utilize o conceito DRY (don’t repeat yourself) na hora de documentar a parametrizar uma aplicação.

*  Seja minimalista, mantenha as informações de configuração tão simples e focadas quanto possível evitando a criação de opções de configuração que nunca serão usadas e usando valores default para informações não declaradas sempre que possível.

* Garanta que voçe possua mecanismos para testar sua configuração no momento do deploy, Verifique se as dependecias de sua aplicação estão disponíveis e quando possível implemente ***smoke tests*** para garantir a entrega e funcionamento de novos recursos.


***Sobre a parte de segurança:***

Tenha em mente que em muitos casos é importante manter as informações de configuração reais específicas para cada um dos ambientes de teste e produção em um repositório separado do seu código-fonte. Esta separação é particularmente relevante para elementos de configuração relacionados à segurança, como senhas e certificados digitais, aos quais o acesso deve ser restrito.

***Come lidar com o sistema operacional?***

Embora seja um componente importante obviamente é impossível manter o sistemoa operacional sob um modelo de controle de versões, ao invés disso uma combinação bem estrturada entre ferramentas de automação de intalação de sistemas e ferramentas de gerenciamento de configuração deve ser suficiente para resolver a questão, dai a existência de conteúdo específico sobre [IAC](https://github.com/2TINsecdevops/aulas/blob/master/content/configuration-management/iac.md); 

---

## Gerenciamento de Mudanças

Não, não falarei sobre ITIL a gerência de mudança que falaremos aqui refere-se a mudanças no ambiente, o primeiro ponto a considerar é simples: **Seu ambiente de produção deve ser completamente bloqueado**, muita gente acredita que uma cultura devops estabelece que um desenvolvedor deve ter acesso direto ao ambiente de produção, bom... na verdade NÃO. Nenhuma mudança deve ser feita sem passar pelo processo de gerenciamento de mudanças que fora definido (Não confunda processo com burocracia, um processo de gerenciamento pode simplesmente ser o pipeline iniciado pelo commit do código e que termina no delivery da alteração em produção).

O motivo é simples: Até uma pequena mudança pode quebrar um sistema complexo. Por isso toda mudança deve ser testada antes de entrar em produção, outro bom motivo para se importar muito com o controle de versão e com a automação de seus processos de deploy.

Nesse sentido, uma mudança em seu ambiente ou **Environment* é como uma mudança em seu software. Ela deve passar por seu processo de build, implantação, teste e deployment exatamente da mesma forma que uma alteração ao código da aplicação.

Para que essa abordagem tenha sucesso considere que ***ambientes de teste devem ser tratados da mesma forma que os ambientes de produção.** é claro que o processo de aprovação geralmente será mais simples mas, em todos os outros aspectos, seu gerenciamento de configuração deverá ser o mesmo. Isso é essencial porque significa que você está testando o processo que você usa para gerenciar seus ambientes de produção durante as implementações mais freqüentes em ambientes de teste.

---

## Material de Referência e Recomendações:

Esse ebook publicado pelo pessoal da codeship descreve qual a abordagem e experiência pessoal deles em relação a versionamento de código:
- [Efficiency in Development Workflows](https://resources.codeship.com/ebooks/efficiency-in-development-workflows?hsCtaTracking=282b4efb-3636-4833-84fb-19eae59ac503%7Ccd120a13-d5bb-434f-9295-b414729901a9)
 
---

**Free Software, Hell Yeah!**
