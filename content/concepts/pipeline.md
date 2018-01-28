# Deployment Pipeline

Uma das bases mais importantes na implementação de metodologias ágeis e de uma cultura devops é compreender e evoluir o processo de delivery ou mais especificamente os mecanismos que estão entre a concepção da idéia e a entrega do código em produção, dentro dessa lógica a implementação de um pipeline é um assunto sobre o qual temos temos de trocar algumas idéias.

*Conceitualmente um "pipeline" ou "deployment pipeline" é a implementação do processo de build, teste e deploy de aplicações*, este processo é distinto em cada organização pois depende de vários fatores, mas o princípio básico envolvido é sempre o mesmo, entender isso é o primeiro passo para começar a entender como uma empresa/organização funciona e como as etapas referentes a entrega de código podem ser melhoradas.

O exemplo abaixo na figura 1.1 foi extraído do Livro de Jez Humble e demonstra um exemplo de um pipeline:

![alt tag](https://github.com/2TINsecdevops/classroom/raw/master/content/images/1.1-pipeline.png)

> Figura 1.1: Exemplo de um modelo simples de pipeline, partindo do commit de código e chegando até a liberação do release da Aplicação.

Um pipeline descreve o modelo usado no processo de deploy, este por exemplo inicia-se no commit de código, cada mudança feita no código, configurações de ambiente ou bases de dados gera um gatilho e consequentemente um processo, a próxima etapa deste processo considerando o modelo descrito será a criação de um binário, o que chamamos de "empacotamento", a partir dai ainda serão executados testes de aceite, testes de carga e finalmente a liberação deste suposto binario, o que em nosso exemplo seria a nossa nova release ou o que chamamos de "release candidate" dai a famosa nomenclatura "rc". 

Se a nossa querida rc passar com glamour por cada um dos testes do pipeline ela poderá ser implementada (Não precisa de nenhum glamour, é s passar mesmo que fica de bom tamanho).

Essa é a essência e função básica de um modelo de pipeline, definir o método utilizado no processo de deployment de uma aplicação, o que está intimamente ligado a idéia de Delivery Continuo  e Integração Continua de código.
