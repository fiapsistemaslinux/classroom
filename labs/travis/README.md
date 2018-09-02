# Usando o Travis para Processos de Delivery Contínuo

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.0-travis.png)


O [Travis](https://travis-ci.org) CI é uma solução de integração/delivery/deployment ofertado no modelo SAAS um software entregue como serviço online tal como Dropbox ou Heroku.

Trata-se de uma ferramenta que funciona no formato freemium, isto é, com funções gratuitas e funções restritas a pacotes de assinatura. Sua funções gratuitas permitem integrações com repositórios publicos do GitHub, recurso que será usado neste laboratório para nossos exemplos de contrução de pipeline para delivery contínuo;

---

## Configurando o repositório para o teste:

1. Antes de iniciar o processo de configuração será necessário uma conta no Github onde você deverá criar um Fork do projeto [python-cicd-buzz](https://github.com/fiapsecdevops/python-cicd-buzz);

2. Neste projeto temos uma aplicação simpels baseada em Python com um teste unitário utilizando o módulo python [pytest](https://docs.pytest.org/en/latest/);

3. Para validar o funcionamento do módulo e da aplicação faça o pull local do reósitório criado e execute locamente em um ambiente com python 2.X.X instalado:

```sh
$ python generator.py
End-To-End Devops Enormously Boosts Continuous Testing
```

4. Para validar o teste automatizado a partir do diretório raiz do projeto crie um ambiente virtual utilizando a ferramenta [virtualenv](https://virtualenv.pypa.io/en/stable/): 

```sh
$ pip install virtualenv
$ virtualenv venv
```

5. Em seguida acesse o ambiente criado e instale as dependências necessárias:

```sh
$ source venv/bin/activate
$ pip install -r requirements.txt
```

6. Execute o test chamando o arquivo **test_generator.py**

```sh
$ python -m pytest -v tests/test_generator.py
```

---

## Criando a integração com o CI:

1. Para começar este lab. crie uma conta gratuita no site [https://travis-ci.org](https://travis-ci.org) faça login utilizando sua autenticação com base em uma conta já existente no Github (a mesma utilizada no paso anterior);

2. Em seguida após autneticar no Travis no menu no canto superior esquerdo da tela exibida escolha a opção **Profile**, você verá uma relação com otdos os reósitórios públicos disponíveis na conta do github, ative a integração para o repositório **python-cicd-buzz**:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.1-travis.png)


3. Após ativar a integração adicione um arquivo **.travis.yml** no diretório raiz do projeto **python-cicd-buzz** com base no conteúdo abaixo:

```sh
language: python
script:
  - python -m pytest -v
```

---

## Testando o processo de integração:

1. Com o conteúdo do arquivo **.travis.yml** criado temos a diretriz necessária para integração, ela instrui a solução de CI a executar um script utilizando a linguagem python (o mesmo script executado manualmente no laboratório anterior):

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.2-travis.png)

> Uma questão extremamente relevante sobre o uso de uma solução de CI como SAAS ao invés da instalação manual como aquela executada no Jenkins é a compatibilidade, soluções online em geral possuem um range espećifico de linguagens com as quais "conversam" o que pode gerar uma limitação a depender do ecossistema do time de desenvolvimento.

2. O log de output deverá exibir os resultados dos testes unitários com códido "0" isto é, execução finalizada com sucesso:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.3-travis.png)

---

## Dockerizando o App para facilitar o Deploy:

1. No diretório raiz do projeto criaremos o arquivo Dockerfile para buildar a aplicação em um container:

``sh
vim Dockerfile
```

Adicione o seguinte conteúdo:

```sh
FROM alpine:3.5
RUN apk add --update python py-pip
COPY requirements.txt /src/requirements.txt
RUN pip install -r /src/requirements.txt
COPY app.py /src
COPY buzz /src/buzz
CMD python /src/app.py
```

> As instruções acima instruem como o docker deverá "buildar" a aplicação utilizando uma imagem alpine e em seguida instalar o Python e o pip e finalmente instalar nosso app. A última linha informa ao docker para iniciar o app sempre que o contêiner for iniciado.


2. A maioria das ferramentas de CI possuem funções que permitem a integração nativa com o DockerHub, para hailitar essa integração usando o Travis crie um diretório chamado .travis e dentro dele um arquivo chamado **deploy_dockerhub.sh** com o conteúdo abaixo:

```sh
#!/bin/sh
docker login -e $DOCKER_EMAIL -u $DOCKER_USER -p $DOCKER_PASS
if [ "$TRAVIS_BRANCH" = "master" ]; then
    TAG="latest"
else
    TAG="$TRAVIS_BRANCH"
fi
docker build -f Dockerfile -t $TRAVIS_REPO_SLUG:$TAG .
docker push $TRAVIS_REPO_SLUG
```

> O script acima será ativado pelo Travis CI no final de cada construção de pipeline e criará uma nova imagem de Docker para deploy;

3. O script requer 3 variáveis ​​de ambiente que você deverá definir acessando a opção "settings" do seu repositório python-cicd-buzz no Travis:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.4-travis.png)

4. Localize o campo "Environment Variables" e adicione as três variáveis definias no script:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.5-travis.png)

5. Finalmente modifique seu arquivo de configuração para que o script que acaba de ser adicionado seja executado como parte do Pipeline, faça isso editando o arquivo **.travis.yml** conforme modelo abaixo:

```sh
sudo: required

services:
  - docker

language: python

script:
  - python -m pytest -v

after_success:
  - sh .travis/deploy_dockerhub.sh
```

6. Após todas essas alterações faça um novo commit, com este commit o fluxo de build estará completo sendo que o próprio commit iniciará o build e entrega da aplicação no Travis:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.6-travis.png)


> Se tudo ocorrer conforme esperado após o tempo necessário para build e execução da integração do Travis de forma automática com o Dockerhub uma versão da aplicação com a TAG "latest" terá sido criado na sua conta no Dockerhub;

---

## Material de Referência e Recomendações:

- Este laboratório foi baseado no artigo ["How to build a modern CI/CD pipeline"](https://medium.com/bettercode/how-to-build-a-modern-ci-cd-pipeline-5faa01891a5b) publicado no Medium por [Rob van der Leek](https://medium.com/@robvanderleek?source=post_header_lockup);

---

**Free Software, Hell Yeah!**