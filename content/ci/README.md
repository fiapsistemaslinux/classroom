# Continuos Integration (Integraçãofdelivy Contínua)

O termo "continuos integration" será um dos pontos bases deste conteúdo, ele refere-se a uma prática adotada por times no processo de desenvolvimento de software onde um repositório é utilizado para centralizar o armazenamento de código, é a partir deste repositório que testes de validação e integração de aplicações serão executados e também é a partir deste mesmo repositório que os binários e fontes de código para entrega de aplicações em produção serão obtidos;

Um dos principais objetivos por trás da integração contínua é centralizar dados de forma que possamos encontrar e investigar bugs mais rapidamente, o que se enquadra perfeitamente na filosofia "Fail Fast, Fail Often" além disso a tendência ao fazer uma BOA implementação deste modelo é melhorar a qualidade do software e reduzir o tempo que leva para validar e lançar novas atualizações.

***Porque a Entegração Continua é necessária?*** 

Uma caracteristica comum e ainda presente na maioria dos ciclos de desenvolvimento é o extenso período que decorre entre o inicio do desenvolvimento e o delivery da primeira release em produção a principal causa disso é provavelmente a mais simples: _Ninguém está interessado em rodar uma aplicação que não esteja finalizada_

Você até chega a commitar seu código, submetendo suas alterações aos testes necessários mas no final acaba "segurando" a alteração localmente ou devido a um fluxo onde seja necessário o agendamento do delivery em produção.

> A coisa toda se torna ainda mais complexa quando este mesmo projeto está dividido em branches com longos ciclos de duração, muitos times agem dessa forma baseando-se em uma interpretação equivocada da metodologia scrum, estes times acambam por criar uma relação de 1:1 entre uma história e uma branch o que acaba retardando suas entregas;

Em contra ponto a isso temos uma das principais discussões relacionadas a devops, o uso de modelos onde a aplicação está praticamente sempre rodando com a ultima release que representa exatamente o esforço atual do time, ou seja, cada recurso desenvolvido é entregue e entra em produção, essa abordagem surge a apartir de relatos de diversas empresas com perfil ágil, a diferença fundamental nessa comparação é o uso da integração contínua.

> Segundo a Bibliografia de Humble e Farley a integração contínua foi descrita pela primeira vez no livro de Kent Beck "Extreme Programming Explained" (publicado pela primeira vez em 1999). Tal como acontece com outras práticas do que chamamos carinhosamente de "Extreme Programming", a idéia por trás do integração contínua foi que, se a integração regular de seu código é boa, por que não fazê-la o tempo todo?

***O que é preciso para chegar a integração contínua?***

Antes de testar qualquer modelo de integração contínua algumas práticas e abordagens são necessárias, quase como pré-requisitos:

1. Versionamento de Código: Conforme descrito na porção deste material que trata desse assunto, TUDO no seu projeto deve ser versionado e controlado: código, testes, scripts de banco de dados, scripts de compilação e implantação e/ou qualquer outra coisa usada para criar, instalar, executar e testar sua aplicação.

2. Processo de Build Automatizado: Para implementar a integração contínua você deverá ser capaz de iniciar o processo de build a partir da linha de comando. A idéia é garantir que seja possível que uma pessoa ou uma máquina execute seu processo de compilação, teste e implantação de forma automatizada através da linha de comando.

3. Prévio acordo entre os times envolvidos: ***A integração continua é uma prática, não uma ferramenta***. E como tal exigirá um grau de compromisso e disciplina comum a todos os componentes do time.

É perfeitamente viável estabelecer um modelo de Integração Continua somente com os três itens acima sem o auxilio de nenhuma ferramenta extremamente elaborada e cara, [o artigo "continuous Integration on a Dollar a Day" publicado por James Shore](http://www.jamesshore.com/Blog/Continuous-Integration-on-a-Dollar-a-Day.html) descreve como implementar "continuos integration" com base apenas no conceito e uma abordagem bem simplificada usando um servidor antigo, uma galinha de boracha e um sino... ;)

***A importância do uso de Testes Automatizados***

Mesmo sendo possível implementar delivery contínuo usando os itens descritos acima não há como chegar a um modelo pleno 100% funcional e confiável sem um bom conjunto de testes automatizados, a implementação destes testes trará confiança ao time eliminando processos de validação como "Code Review" ou Pull Requests para aprovação de terceiros. 

> Em um futuro próximo falaremos sobre testes mas em um ambito geral (trataremos sobre os tipos de testes e práticas importantes relacionadas a modelos de integração).

## Ferramentas de Apoio

Embora não sejam um mecanismo essencial para a integração contínua o uso de uma ferramenta para programação de delivery criação de pipelines e comunicação com o repositório será de extrema utilidade.

Algumas das ferramentas mais famosas criadas com essa finalidade foram listadas abaixo:

* [Jenkins](https://jenkins.io/)
* [Travis](https://travis-ci.org/)
* [Hudson](http://hudson-ci.org/)

Em nossos testes faremos a [implementação do Jenkins e sua integração com o git](https://github.com/2TINsecdevops/classroom/tree/master/labs/jenkins), entretando qualquer uma das soluções acima servem bem a esse processo principalmente o travis que vem ganhando terreno rapidamente nos ultimos anos.