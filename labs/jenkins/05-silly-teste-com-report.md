# Melhorando a integração com o Git e Executando um Test Unitário

Neste laboratório haverá uma pequena evolução em nosso modelo, utilizaremos um teste unitário simples com base no frameqrok mocha para validar se aplicação continua funcional após um commit o que se resume a um simples teste esperando a respota 200 do protocolo HTTP (Por isso o teste é tão simples).

> A idéia base do lab. não é demonstrar como fazer testes unitários utilizando node mas sim definir como vincular a execução de testes ao processo de deploy da aplicação e como utilizar um ci com mecanismos de autenticação para reports automáticos no repositório após a execução de uma bateria de testes.

---

## Configurando o repositório no Github

Para aumentarmos o nível de integração entre o CI e o repositório será necessário conceder as permissões necessárias para que o Jenkins escreva no github ao executar jobs, a idéia é permitir um report automático melhorando o modelo de integração contínua;

1. O primeiro passo para este setup é a criação de um Token no github, tokens de autenticação são utilizados para que ferramentas automatizadas possam se autenticar de forma segura no repositório utilizando plugins para escrever retornos e até atualizar informações.

2. Dentro de sua conta no github clique no ícone de usuário e em seguida selecione **"Settings"** e depois **"Developer settings"**:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.0-jenkins.png)

3. Na tela seguinte selecione a opção **"Personal access tokens"** e a opção "Generate new token**:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.1-jenkins.png)


4. NA tela seguinte defina o nome para seu token (Fica a sua escolha essa definição), nas opções de scopo vocẽ definirá quais as permissões concedidas para o acesso executado a partir deste token, com relação a este escopo preencha marcando as opções **admin:repo_hook, repo** e também **repo:status** 

Essas serão as permissões necessárias para que o Jenkins acesse e faça as publicaçẽos de report no repositório, revise as permissões de acordo com a imagem abaixo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.2-jenkins.png)

5. Com as permissões definidas crie o token, o valor será exibido **SOMENTE** no momento da criação e deverá ser salvo para uso futuro.

---

## Configurando as Credenciais com o Token no Jenkins

1. Dentro do Jenkins executaremos a configuração das credenciais de Acesso, para isso selecione as opções: **Jenkins | Credentials**

2. Clique sob a opção **global** e selecione **Add credentials** conforme abaixo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.3-jenkins.png)

3. No tipo de credencial escolha **Secret file** e adicione o token salvo anteriormente, mantenha o campo ID em branco e adicone uma descrição ao token:

![alt tag]
(https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.4-jenkins.png)

4. Para que essas credenciais sejam aplciadas na página inicial do Jenkins selecione: **Manage Jenkins | Configure System**

![alt tag]
(https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.5-jenkins.png)

5. Locali/ze a seção **github** e configure conforme abaixo:

![alt tag]
(https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.5.6-jenkins.png)

6. Salve as alterações prepare-se para configurar o Job.

---

## Adicionando um repositório com teste unitário:

Como será necessário a execução de um teste unitário utilizaremos outro repositório como base, para isso faça um Fork do repositório [node-sample-test](https://github.com/fiapsecdevops/node-sample-test);

> As diferenças entre este repositório e o repositório do Laboratório anterior são basicamente o [teste unitário](https://raw.githubusercontent.com/fiapsecdevops/node-sample-test/master/test/test.js) adicionado no diretório test e as dependências request, mocha e chai que passam a ser instaladas no momento do build do container a partir do [arquivo packages](https://raw.githubusercontent.com/fiapsecdevops/node-sample-test/master/package.json), ou seja, ao invés de clonar o novo repositório você também pode adicionar essas alterações no repositório atual.

## Criando o Job no Jenkins

Crie um Job no Jenkins para executarmos nossa base de testes:

- Selecione **"New Item"** na página inicial:

- Como nome para o novo item Insira **node-unit-tests** no campo **"Enter an item name"**;

- Escolha Projeto **"Freestyle Project"** e selecione **"OK"**;

- Na seção Geral, selecione **"GitHub Project"** e insira a URL do repositório, como por exemplo https://github.com/fiapsecdevops/node-sample-app;

- Na seção **"Source Code Management"**, selecione **Git** e insira a URL .git do repositório, por exemplo, https://github.com/fiapsecdevops/node-sample-app.git **É importante não esquecer fo .git no final**;

- Na seção **"Build Triggers"** selecione **"GitHub hook trigger for GITScm polling"**.

- Na seção **"Build"**, clique em **"Add Build Step"** e selecione **"Execute shell"**, em seguida, adicione a base de comandos descrita abaixo:

```sh
docker build --tag node-sample-app:rc-$BUILD_NUMBER .
docker stop node-sample-app-rc && docker rm node-sample-app-rc
docker run -d -v "$WORKSPACE"/test/report:/usr/src/app/test/report -e MOCHA_FILE="./test/report/jenkins-test-results.xml" --name node-sample-app-rc node-sample-app:rc-$BUILD_NUMBER
```

- Adicione uma segunda etapa na mesma seção, Para isso clique novamente em **"Build"**, clique em **"Add Build Step"** e selecione **"Execute shell"**  em seguida, adicione a base de comandos descrita abaixo:

```sh
docker exec  node-sample-app-rc ./node_modules/mocha/bin/mocha --reporter mocha-junit-reporter
docker stop  node-sample-app-rc && docker rm  node-sample-app-rc
```

- Após adicionar os porcessos de builds vamos aos reports, clique em "Add post-build action", e escolha a opção **Publish JUnit test result report** no campo "Test report XMLs" inclua o conteúdo a seguir: "test/report/jenkins-test-results.xml"

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.6.0-jenkins.png)

- Em seguida para que o report seja publicado no Github escolha adicone mais um passo clicando na opção "Add post-build action", dessa vez escolha a opção "Set GitHub commit status (universal)", nesta configuração alterer o campo "Status Result" para "One of default messages statuses" conforme abaixo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.6.1-jenkins.png)

- Salve a alteração na parte inferior da janela de trabalhos.

---

## Criando o Job de Deploy

O Job responsável pelo Deploy possuirá a mesma configuração executada no capítulo 4 com a excessão de que no novo formato a "triger" para deploy será o sucesso do Job anterior que possui nosso teste unitário.

1. Entre novamente no Job criado no capítulo 4 e no menu ao lado esquerdo da tela clique na opção **Configure**;

2. Na seção "Build Triggers" DESMARQUE a opção **GitHub hook trigger for GITScm polling**. e marque a opção **Build after other projects are built**;

3. No campo **"Projects to watch"** adicione o nome do projeto com o teste unitário que criamos anteriormente e marque a opção **"Trigger only if build is stable"**;

---

## Testando o modelo:

Para testar a nova configuração de integração faça um novo commit no repositório, este commit acionará o job responsável pelo teste unitário, você pode acompanhar o Output do Console para verificar se o teste foi executado com sucesso;

Caso o teste seja executado com sucesso o CI deverá emitir um update no cmmit no repositório com o status OK, essa informação pode ser consultada no campo "Commits" do seu repositório no GitHub.

Além disso a partir do commit haverá um link para consulta dos resultados dos testes similar ao modelo abaixo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.6.2-jenkins.png)

> Os resultados dos testes também podem ser observados na página no Job no Jenkins, isso é resultado do recurso do JUnit + o módulo mocha-junit-reporter configurado no Framework de testes mocha;

Finalmente como o processo de Build foi vinculado ao sucesso do Job de testes se tudo ocorreu conforme esperado o Job deverá ter executado o build da nova versão do projeto que estará acessível a partir do endereço: http://<URL_DO_JENKINS>:8080

---

## Referências:

- Este laboratório foi adptado do artigo publicado por Stefan Fidanov na página [https://www.terlici.com/blog/](https://www.terlici.com/2015/09/29/automated-testing-with-node-express-github-and-jenkins.html); 

---

**Free Software, Hell Yeah!**