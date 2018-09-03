# Preparando a interação entre o Github e o Travis CI:

Neste laboratório será configurada a integração entre uma conta no Github e a Ferramente de CI Travis.

**Configurando o repositório para o teste:**

1. Antes de iniciar o processo de configuração será necessário uma conta no Github onde você deverá criar um Fork do projeto [python-cicd-buzz](https://github.com/fiapsecdevops/python-cicd-buzz);

2. Neste projeto temos uma aplicação simples baseada em Python com um teste unitário utilizando o módulo [pytest](https://docs.pytest.org/en/latest/);

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

**Criando a integração com o CI:**

1. Para começar este lab. crie uma conta gratuita no site [https://travis-ci.org](https://travis-ci.org) faça login utilizando sua autenticação com base em uma conta já existente no Github (a mesma utilizada no paso anterior);

2. Após autenticar no menu no canto superior esquerdo da tela exibida no Travis escolha a opção **Profile**, você verá uma relação com otdos os reósitórios públicos disponíveis na conta do github, ative a integração para o repositório **python-cicd-buzz**:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.1-travis.png)


3. Após ativar a integração adicione um arquivo **.travis.yml** no diretório raiz do projeto **python-cicd-buzz** com base no conteúdo abaixo:

```sh
language: python
script:
  - python -m pytest -v
```

---

**Testando o processo de integração:**

1. Com o conteúdo do arquivo **.travis.yml** criado temos a diretriz necessária para integração, ela instrui a solução de CI a executar um script utilizando a linguagem python (o mesmo script executado manualmente no passo anterior), voltando a tela inicial do Travis você verá op repositório integrado e clicando sobre ele o processo de build gerado pelo commit:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.2-travis.png)

> Uma questão extremamente relevante sobre o uso de uma solução de CI como SAAS ao invés da instalação manual como aquela executada no Jenkins é a compatibilidade, soluções online em geral possuem um range espećifico de linguagens com as quais "conversam" o que pode gerar uma limitação a depender do ecossistema do time de desenvolvimento.

2. Verifique o log de output deverá com os resultados dos testes unitários com códido "0" isto é, execução finalizada com sucesso:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.3-travis.png)

---

## Material de Referência e Recomendações:

- Este laboratório foi baseado no artigo ["How to build a modern CI/CD pipeline"](https://medium.com/bettercode/how-to-build-a-modern-ci-cd-pipeline-5faa01891a5b) publicado no Medium por [Rob van der Leek](https://medium.com/@robvanderleek?source=post_header_lockup);

Próxima Etapa: [Dockerizando o App para facilitar o Deploy](https://github.com/fiapsecdevops/classroom/blob/master/labs/travis/02-lab-dockersetup.md);
