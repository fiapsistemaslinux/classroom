# Preparando a interação entre o Github e o Travis (Node):

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.0-travis-b.png)


Neste laboratório será configurada a integração entre uma conta no Github e a Ferramenta Travis utilizando uma base de código node e um teste unitário como um gatilho a ser executado após alterações no código;

# 1 - Criando a aplicação de testes:

> Execute esta etapa utilizando um host com node na versão 8 instalado;

1. Inicie a configuração de um novo projeto node:

```sh
mkdir labtravis-node
cd labtravis-node
npm init
```

2. Crie o código do nosso app. Utilize um arquivo chamado index.js na raiz do projeto:

**conteúdo do arquivo index.js**

```sh
var express = require('express')
var app = express()

app.set('port', 5000)
app.use(express.static(__dirname + '/public'))

app.get('/', function(request, response) {
          response.send(
              'Continuous Integration (CI) is a development practice that requires developers to integrate code into a sh    ared repository several times a day. Each check-in is then verified by an automated build, allowing teams to detect problems early.'
          )
})

app.listen(app.get('port'), function() {
    console.log("Node app is running at localhost:" + app.get('port'))
})
```

2.1 Instale as dependências necessárias para execução do teste:

```sh
npm install express request --save
npm install mocha chai --save-dev
```

3. Para que exista algum gatilho a ser configurado no CI adicionaremos um teste unitário simples, crie uma pasta de teste e um arquivo index-spec.js dentro dessa pasta:

```sh
mkdir test
```

**conteúdo do arquivo index-spec.js**

```sh
var app = require('../index')

var http = require('http'),
    assert = require('assert'),
    express = require('express'),
    app = express();
    
app.set('port', 5000)

var baseurl = 'http://127.0.0.1:' + app.get('port') + '/';
console.log('Testing with URL', baseurl);

var request = require('request');
var assert = require('chai').assert;

describe('/', function () {
  it('should return 200', function (done) {
    request(baseurl, {json:true}, function(err, response, body) {
      assert.equal(200, response.statusCode);
      done();
    });
  });
});
```

4. Por padrão, o Travis executará o teste com base na estrutura de testes declaradas no package file, neste cenário defina o comando de teste para o mocha:

**edite o arquivo package.json**

```sh
[..]
"scripts": {
    "test": "mocha --exit"
},
[..]
```

5. Você poderá executar os testes com o comando abaixo:

``` sh
npm test
```

Certifique-se de que os testes estão sendo executados e passando;

# 2 - Criando a integração com o Travis

1. Crie um arquivo .travis.yml na raiz do projeto:

```sh
language: node_js
node_js:
  - "8"
```

> language: node_js - Indica ao Travis a linguagem sendo utilizada no projeto;
> node_js: "stable" - Indica que o projeto deve ser testado em relação à última versão estável do Node;


2. Para testar a integração crie um novo repositório no Git:

```sh
echo node_modules > .gitignore

git init
git add -A
git commit -a -m "Add node app to test integration with travis"
git remote add origin git@github.com:SEUUSUARIO/SEUREPOGIT.git
```

> O Github é famoso por possuir mecanismos de integração automaticos com muitas ferramentas de ci, teste de aplicação e etc, a ideia de uma integração pré configurada facilita muito o processo de construção de fluxo pois elimina a etapa de configuração de webhooks com base nas apis da ferramenta e/ou do repositório base.

3. Em nosso cenário utilizaremos a integração entre o Travis e o Git, para isso acesse a página [https://travis-ci.org/](https://travis-ci.org/) e faça login utilizando a suas credenciais do github através do botão **Sig in with GitHub**;

4. Na tela inicial do Travis clique sobre o seu ícone de usuário no canto superior direito da tela, escolha a opçaõ **Settings** no canto superior direito da tela:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.9-travis.png)


5. Você verá uma lista de repositórios com base em sua conta Git, localize o repositório deste teste e habilite a integração (clique no switch button a frente do nome do repo.);

6. Voltando a página inicial a partir da opção **Dashboard** é possível iniciar um novo Build usando a opção **Trigger a build** ou executando alguma alteração no repositório original no Git (Tente criar um README file por exemplo);

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.10-travis.png)


7. Se o processo de integração funcionar conforme esperado será possível observar o inicio e execução do Job no Travis com o pequeno exemplo de teste criado:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.11-travis.png)



---

## Referências:

- Este laboratório foi construído com base em um outro exemplo de integração publicado no www.codeblocq.com: [Setup Travis CI with your node project](http://www.codeblocq.com/2016/04/Setup-Travis-CI-with-your-node-project/);

- Documentação de refêrencia de integração do Travis para Javascript com nodejs [Building a JavaScript and Node.js project](https://docs.travis-ci.com/user/languages/javascript-with-nodejs/); 

---

**Free Software, Hell Yeah!**
