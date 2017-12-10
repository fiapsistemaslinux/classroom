# Versinando Código

**Objetivo:** Criar um repositório Git e validar o push de alterações para o Projeto;

---

## Criando a conta no github:

1. O primeiro passo para execução deste laboratório é a criação de uma conta no Github ( Caso você ainda não possua uma ); para isso faça o Registro de sua conta acessando o endereço [https://github.com/join](https://github.com/join), uma vez que o registro seja finalizado certifique-se de que o host utilizado para este Lab possui o git instalado, instruções de instalação para Linux e para Windows podem ser adquiridas no link abaixo:

* [Primeiros passos - Instalando Git](https://git-scm.com/book/pt-br/v1/Primeiros-passos-Instalando-Git)
 
2. Com o Git devidamente instalado configure as opções globais de usuário e email de acordo com os dados de sua conta no Github:

```sh
# git config --global user.email "usuario@email.com.br"
# git config --global user.name "usuario"
```

3. Faça logon na conta GitHub e navegue até a página do usuário. No canto superior direito, clique no botão "+" e Selecione "Novo repositório".

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/devops/images/git-new-repo.png)

Para padronizarmos a tarefa nomeie e novo projeto como ***"hello-ruby"*** e coloque uma descrição simples. Em seguida selecione ***"Inicializar este repositório com um README"***, e clique no botão ***"Criar repositório"***.

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/devops/images/git-new-repo-setup.png)

4. Na etapa seguinte você executara o clone deste repositório para o diretório local, para isso copie a URL HTTPS para a área de transferência clicando no botão verde ***"Clone or Download"*** no repositório criado a pouco no Github. Não esqueça de selecionar a opção "Usar HTTPS" uma vez que não fizemos a configuração da chave SSH, copie o URL fornecido na área de transferência. Este URL será passado como um argumento para o git clone;

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/devops/images/git-new-repo-clone.png)


No ambiente onde o git fora instalado execute:

```sh
# git clone https://github.com/seu-usuario/ruby-hello.git

Cloning into 'hello-ruby'...
remote: Counting objects: 3, done.
...

```

Este repositório será criado no diretório local a partir do qual o git clone foi executado:

```sh
# cd ruby-hello
```

5. Usando o editor de sua preferência edite o arquivo README.md adicionando algum conteúdo. ( A idéia é que o arquivo seja alterado para que ele possamos validar o commit );

```sh
# git add README.md
# git commit -m “Changed the README.md”
```

Esse execução irá adicionar todos os arquivos já modificados para o index e em seguida executar o commit, finalmente execute o push das mudanças para o repositório no GitHub:

```sh
# git push origin master
```

No processo de autenticação o Git solicitará o nome de usuário e a senha do GitHub, verifique os arquivos no repositório na interface da web do GitHub, as alterações executadas deverão ser visíveis.

6. Crie uma nova Branch para adicionar algum código ao nosso projeto:

```sh
# git checkout -b initial
```

7. Dentro dessa branch crie um arquivo chamado ***app.rb*** com o conteúdo abaixo:

```sh
require 'sinatra'
class HelloWorld < Sinatra::Base
get '/' do
 "Hello, world!"
end
get '/:name' do
 "Hello, #{params[:name]}!"
end
end
```

8. Além deste arquivo crie um arquivo chamado ***config.ru***:

```sh
require './app'
run HelloWorld
```

9. Como todas as dependencias serão gerenciadas utilizando um bundler utilizaremos um gemfile para definir essas depências, para isso crie um terceiro e ultimo arquivo chamado **Gemfile*** conforme abaixo:

```sh
source 'https://rubygems.org'
gem 'sinatra'
gem 'minitest'
gem 'rack-test'
```

> Se houverem dificuldades ou alguma duvida sobre a sintaxe utilize o repositório disponível em [https://github.com/fiap2tin/hello-ruby](https://github.com/fiap2tin/hello-ruby) como base;

10. Uma vez que os arquivos tenham sido criados vamos adicioná-los ao index:

```sh
# git add app.rb config.ru Gemfile
# git status
```

11. Em seguida crie o commit a ser enviado para o Github:

```sh
# git commit -a -m "Creating initial app.rb file with Gemfile dependences"
```

12. Finalmente faça o push das alterações para entrarmos na fase final:

```sh
# git push --set-upstream origin initial
```

---

## Criando um Fork de um Projeto

A idéa de trabalhar em Projetos de forma colaborativa  muito importante e extremamente ligada a maneira como o Git foi concebido com raizes na filosofia Open Source dos Sistemas Linux, uma das maneiras de trabalhar de forma colaborativa  contribuir para outros projetos executando Pull Request de alteraçes, outra possibilidade  a criação de um Fork o que permitira trabalhar localmente em um Projeto e submeter alterações em uma versão local, uma bifurcação do projeto original;

1. Acesse um Projeto para ser clonado, nesre exemplo utilizaremos o projeto [nodejs-docs-hello-world](https://github.com/Azure-Samples/nodejs-docs-hello-world), um simples Hello World em NodeJS mantido pela Azure para modelos de exemplo como esse.

2. Estando autenticado e na página do Projeto para criar o fork do repositório para sua própria conta do GitHub, clique no botão ***Fork*** no canto superior direito.

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/devops/images/github-fork-01.png)

3. Você vera uma tela conforme abaixo, em segundos o processo ser finalizado, a ideia e criar um cópia local do projeto que possa ser manipulada com execução de commits sem a necessidade de aprovação ou seja, sem que sejam feitos pull requests no projeto original;

![alt tag](https://raw.githubusercontent.com/wiki/fiap2tin/devops/images/github-fork-02.png)

---

**Questão Rápida:*** Com base nos testes executados até aqui responda a [Questão 2.1](https://pt.surveymonkey.com/r/XHJM5LV);

**Porque não utilizamos um fork?** Se já temos um repositório git com esse código porque não apenas criar um fork?

Para não perder a graça, a ideia desse primeiro laboratório é alinhar e nivelar alguns conhecimentos sobre Git que serão uteis em aulas vindouras, desconsiderando isso o procedimento mais comum realmente seria a criação de um fork, se você não está familiarizado com essa ideia pode dar uma olhada nos links abaixo:

* [https://git-scm.com/book/pt-br/v1/Git-Distribu%C3%ADdo-Contribuindo-Para-Um-Projeto](https://git-scm.com/book/pt-br/v1/Git-Distribu%C3%ADdo-Contribuindo-Para-Um-Projeto);
