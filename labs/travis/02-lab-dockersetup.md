
# Dockerizando o App para facilitar o Deploy:

Neste laboratório criaremos o arquivo Dockerfile necessário para criar um deploy da aplicação testada no laboratório anterior utilizando o Docker e o Travis integrado a uma conta no Dockerhub;

**Criando o Dockerfile:**

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
docker login -u $DOCKER_USER -p $DOCKER_PASS
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


**Ajustando o Deploy no Travis:**

1. Finalmente modifique seu arquivo de configuração para que o script que acaba de ser adicionado seja executado como parte do Pipeline, faça isso editando o arquivo **.travis.yml** conforme modelo abaixo:

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

2. Após essa alteração faça um novo commit, com este commit o fluxo de build estará completo sendo que o próprio commit iniciará o build e entrega da aplicação no Travis:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.6-travis.png)


> Se tudo ocorrer conforme esperado após o tempo necessário para build e execução da integração do Travis de forma automática com o Dockerhub uma versão da aplicação com a TAG "latest" terá sido criado na sua conta no Dockerhub;

---

## Material de Referência e Recomendações:

- Este laboratório foi baseado no artigo ["How to build a modern CI/CD pipeline"](https://medium.com/bettercode/how-to-build-a-modern-ci-cd-pipeline-5faa01891a5b) publicado no Medium por [Rob van der Leek](https://medium.com/@robvanderleek?source=post_header_lockup);

---

**Free Software, Hell Yeah!**