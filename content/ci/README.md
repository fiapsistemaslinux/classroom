# Continuos Integration (Integração Contínua)

O termo "continuos integration" será um dos pontos bases deste conteúdo, ele refere-se a uma prática adotada por times no processo de desenvolvimento de software onde um repositório é utilizado para centralizar o armazenamento de código, é a partir deste repositório que testes de validação e integração de aplicações serão executados e também é a partir deste mesmo repositório que os binários e fontes de código para entrega de aplicações em produção serão obtidos;

Um dos principais objetivos por trás da integração contínua é centralizar dados de forma que possamos encontrar e investigar bugs mais rapidamente, o que se enquadra perfeitamente na filosofia "Fail Fast, Fail Often" além disso a tendência ao fazer uma BOA implementação deste modelo é melhorar a qualidade do software e reduzir o tempo que leva para validar e lançar novas atualizações.

**Porque a Entegração Continua é necessária?**

Uma caracteristica comum e ainda presente na maioria dos ciclos de desenvolvimento é o extenso período que decorre entre o inicio do desenvolvimento e o delivery da primeira release em produção a principal causa disso é provavelmente a mais simples: _Ninguém está interessado em rodar uma aplicação que não esteja finalizada_

Você até chega a fazer o _"commit"_ de seu código, submetendo suas alterações aos testes necessários mas no final acaba "segurando" a alteração localmente (ou em uma Branch da vida) devido a um fluxo onde seja necessário o agendamento do delivery em produção.

> A coisa toda se torna ainda mais complexa quando este mesmo projeto está dividido em branches com longos ciclos de duração, muitos times agem dessa forma baseando-se em uma interpretação meio que equivocada da metodologia [scrum](https://pt.wikipedia.org/wiki/Scrum_(desenvolvimento_de_software)), estes times acambam por criar uma relação de 1:1 entre uma história e uma branch o que acaba retardando suas entregas, alias por definição é impossível implementar um modelo compleot de _"continuous integration"_ usando branchs, pois, se você está trabalhando em uma branch seu código NÃO está sendo integrado com o código criado simultaneamente por outros desenvolvedores.

Em contra ponto a isso temos uma das principais discussões relacionadas a devops, o uso de modelos onde a aplicação está praticamente sempre rodando com a última release que representa exatamente o esforço atual do time, ou seja, cada recurso desenvolvido é entregue em produção, essa abordagem surge a apartir de relatos de diversas empresas com perfil ágil, a diferença fundamental nessa comparação é o uso da **integração contínua**.

> Segundo a bibliografia de Humble e Farley a integração contínua foi descrita pela primeira vez no livro de Kent Beck "Extreme Programming Explained" (publicado pela primeira vez em 1999). Tal como acontece com outras práticas do que chamamos carinhosamente de "Extreme Programming", a idéia por trás do integração contínua foi que, se a integração regular de seu código é boa, por que não fazê-la o tempo todo?

**O que é preciso para chegar ao _"Continuous Integration"_ ?**

Antes de testar qualquer modelo de integração contínua algumas práticas e abordagens são necessárias, quase como pré-requisitos:

1. Versionamento de Código: Conforme descrito na porção deste material que trata desse assunto, TUDO no seu projeto deve ser versionado e controlado: código, testes, scripts de banco de dados, scripts de compilação e implantação e/ou qualquer outra coisa usada para criar, instalar, executar e testar sua aplicação.

2. Processo de Build Automatizado: Para implementar a integração contínua você deverá ser capaz de iniciar o processo de build a partir da linha de comando. A idéia é garantir que seja possível que uma pessoa ou uma máquina execute seu processo de compilação, teste e implantação de forma automatizada através da linha de comando.

3. Prévio acordo entre os times envolvidos: ***A integração continua é uma prática, não uma ferramenta***. E como tal exigirá um grau de compromisso e disciplina comum a todos os componentes do time.

É perfeitamente viável estabelecer um modelo de Integração Continua somente com os três itens acima sem o auxilio de nenhuma ferramenta extremamente elaborada e cara, [o artigo "continuous Integration on a Dollar a Day" publicado por James Shore](http://www.jamesshore.com/Blog/Continuous-Integration-on-a-Dollar-a-Day.html) descreve como implementar "continuos integration" com base apenas no conceito e uma abordagem bem simplificada usando um servidor antigo, uma galinha de boracha e um sino... ;)

4. Não há como chegar a um modelo pleno 100% funcional e confiável de _"contínuos integration"_ e ao tão sonhado [continuos deployment](https://github.com/2TINsecdevops/classroom/blob/master/content/concepts/cd.md) sem um bom conjunto de testes automatizados, a implementação de testes trará confiança ao time eliminando processos de validação como "Code Review" ou pull requests para aprovação de terceiros.

> Em um futuro próximo falaremos sobre testes mas em um ambito geral (trataremos sobre os tipos de testes e práticas importantes relacionadas a modelos de integração).

**Quando for testar tente fazer isso rápido...**

Os testes automazados são importantes, mas você não terá o dia todo para fazer isso, talvez você até tenha mas seu processo de build automatizado definitivamente não tem. a questão a ser considerada aqui é que testes demasiadamente longos podem ocasionar alguns problemas:

* Se os testes demorarem demais os desenvolvedores tendem a simplesmente parar de executar a relação inteira de testes antes de fazer o deploy;

* O processo de integração contínua como um todo pode tornar-se lento e no caso de multiplos commits teremos multiplas trigers simultâneas, isso complica bastante a depuração de erros em uma eventual falha;

* Todo o _"overhead"_ descrito acima pode fazer com que os desenvolvedores passem a subter alterações com menos frequência (Eu faria exatamente isso =]);

Resumindo: É muito interessante que o processo de build incluindo todos os testes de integração envolvidos dure não mais que alguns minutos, algo entre 5 e 10 minutos? talvez 15? Fica a seu critério mas considere essas questões sempre que pensar em um novo build e em sua relação de testes;

> A questão descrita acima pode parecer complicada e até incoerente se considerar o que já foi dito sobre a importência dos testes. Mas vale lembrar que existem "n" técnicas que você podem ser usadas para reduzir o tempo de compilação. Entre elas podemos citar o uso de ferramentas de tipo XUnit, como JUnit e NUnit, que permitiram a você determinar quanto tempo cada teste leva , a dica é identificar quais os testes que estão lentos, e tentar otimizá-los obtendo a mesma cobertura e confiança em seu código com menos processamento. Outras questões podem ser consideradas como o uso de frameworks tipo Mocha famoso framework usado na linaguagem nodeJS e o uso de recursos da própria linguagem usada como o paralelismo de tarefas proprorcionado pelo uso de goroutines na linguagem go.

**Manipulando Worskpaces**

Ser capaz de reproduzir de forma fidedigna o ambiente de produção é uma prática e quase um pré-requisito em uma boa cultura DevOps, ambientes de desenvolvimento devem possuir essa caracteristicas sejam eles locais como costumam ser na maioria dos casos ou centralizados, dai outra belíssimo uso para todos, [aquele papo sobre gerencimento de configuração]((https://github.com/2TINsecdevops/classroom/blob/master/content/concepts/configuration-management) a ideia é que se possa usar os mesmos processos de automação e testes reproduzindo o ambiente de produção.

---

## Ferramentas de Apoio

Embora não seja um mecanismo essencial para _"contínuous integration"_ o uso de uma ferramenta para programação e automação de delivery bem como a criação de pipelines e comunicação com o repositório será de extrema utilidade.

Algumas das ferramentas mais famosas criadas com essa finalidade foram listadas abaixo:

* [Jenkins](https://jenkins.io/)
* [Travis](https://travis-ci.org/)
* [Hudson](http://hudson-ci.org/)

Em nossos testes faremos a [implementação do Jenkins e sua integração com o git](https://github.com/2TINsecdevops/classroom/tree/master/labs/jenkins), entretando qualquer uma das soluções acima servem bem a esse processo principalmente o travis que vem ganhando terreno rapidamente nos ultimos anos.

Vale lembrar que plataformas de Paas (Plataform as a Service) também podem ser empregadas nessa finalidade, neste contexto citarei como exemplo o [Heroku](https://www.heroku.com/home) que vem ganhando o respeito e o coração de muitos desenvolvedores pela facilidade e conjuntos de recursos que fornece para processos de delivery.

***Fica a Dica***

Implementar uma ferramenta de ci internamente (dessas que devem ser instaladas e não fornecidas como um serviços em cloud) é uma terefa e tanto, é muito provável que você precise instalar softwares, corrigir dependẽncias, montar integrações... Bastante trabalho mesmo. Sendo assim caso você seja o herói que decidiu seguir por este caminho aproveite esta oportunidade para evoluir a maneira como trata sua infra-estrutura, faça anotações sobre tudo o que for necessário, documente isso de laguma forma (pode ser em uma wiki ou no próprio código), dedique um tempo para identificar qualquer software ou configuração que seu sistema dependa e para aplicar conceitos já discutidos até aqui como [controle de versão](https://github.com/2TINsecdevops/classroom/blob/master/content/configuration-management/git.md) e [automação de infraestrutura como código](https://github.com/2TINsecdevops/classroom/blob/master/content/configuration-management/iac.md);

---

## Concluindo

Dentre as muitas caracteristicas e praticas descritas neste material a implementação de _"Continuous Integration"_ é decididamente a mais importante delas, isso porque ao ultrapassar essa etapa o time tende a ganhar tanto em performance como em experiência.

Jez Humble e David Farley descrevem em sua bibliografia o que seria um paradigma na implementação de _"Continuous Integration"_:

_...Implementar "Continuous Integration" é criar uma mudança de paradigma em sua equipe. Sem "Continuous Integration", sua aplicação está quebrada até que se prove o contrário. Com o CI, o estado padrão de sua aplicação é funcionando e em produção, com um nível de confiança que depende da extensão da cobertura dos testes automatizados. CI cria um loop de feedback apertado que permite que você encontre problemas assim que eles são introduzidos, principalmente quando estes problemas são simples e fáceis de consertar..._

Essa ideia é interessante e demonstra como a ruptura nessa implementação se da muito mais do ponto de vista cultural que do uso de ferrramentas, e aqui vem a pegadinha: Embora essa seja a pratica mais importante ela depende diretamente de outras três: Testes Automatizados, Automação do Processo de Build da Aplicação e Versionamento de Código e Dependências. Se preferir considere que essas três prátcias compõem o processo de "Continuous Integration" e se juntam a vontade do time como um mantra para aqueles que pretendem seguir por esse caminho.