## Deployment Pipeline

Uma das bases mais importantes na implementação de metodolias ágeis e de uma cultura devops é compreender e evoluir o processo de delivery ou mais especificamentes os mecanismos que compõem os momentos entre a concepção da idéia e a entrega do código em produção. dentro dessa idéia a implementação de um pipeline é um assunto sobre o qual temos temos de trocar algumas idéias.

*Conceitualmente um "pipeline" ou "deployment pipeline" é a implementação do processo de build, teste e deploy de aplicações*, este processo é distindo em cada organização pois depende de "n" fatores, mas o princípio básico envolvido é sempre o mesmo, entender isso é começar a entender o processo para que ai sim ele possa ser mudado.

O exemplo abaixo na figura 1.1 foi extraído do Livro de Humble e demonstra um exemplo de um pipeline:

![alt tag](https://github.com/helcorin/secdevops/raw/master/content/concepts/images/1.1-pipeline.png)

> Figura 1.1: Exemplo de um modelo simples de pipeline, partindo do commit de código e chegando até a liberação do release da Aplicação.

Um pipeline descreve o modelo usado no processo de deploy, este por exemplo inicia-se no commit de código, cada mudança feita no código, configurações de ambiente ou bases de dados gera um gatilho e consequentemente um processo, a próxima etapa deste processo considerando será a criação de um binário ou empacotamente se preferir, a partir dai ainda serão executados testes de aceite, testes de carga e a partir daí a liberação deste suposto binario, o que em nosso exemplo seria a nossa nova release ou o que chamamos de "release candidate" dai a famosa nomenclatura de "rc`s". 

Se a nossa querida rc passar com glamour por cada um dos testes que compoẽm o pipeline ela poderá ser implementada.

Essa é a essência e função básica de um modelo de pipeline, definir o método utilizado no processo de deployment de uma aplicação, o que está intimamente ligado a idéia de Delivery Continuo  e Integração Continua de código.

