!SLIDE inverse center transition=scrollUp

<img src="../_images/rsz_fiap-logo.png" alt="Fiap Logo">

<h2 style="color:white;">Twelve-Factor Applications</h2>

!SLIDE incremental transition=scrollUp

# Twelve-Factor Applications

A questão e motivação do desenvolvimento do tipo Cloud-native envolve várias características-chave, uma delas é a coleção de patterns descrita como **Twelve-Factor Applications:**

- O *Twelve-Factor* é uma coleção de padrões para arquiteturas de aplicações, originalmente desenvolvidas por engenheiros da Heroku.

- Essses padrões descrevem um arquétipo de aplicações com base no que geralmente é pré-requisito para que um software opere conforme esperado utilizando o máximo de recursos e vantagens que o modelo baseado em cloud computing tenha a disposição.

- A lista com os dose componentes pode ser obtida em protuguês neste endereço: [https://12factor.net/pt_br/](https://12factor.net/pt_br/)


!SLIDE incremental transition=scrollUp

# Base de Código

Um dos pontos mais relevantes dentro do Twelve-Factor refere-se a como controlar código:

Neste item dois pontos são muito relevantes:

.callout.info `...If there are multiple codebases, it’s not an app – it’s a distributed system. Each component in a distributed system is an app, and each can individually comply with twelve-factor...`

.callout.info `...Multiple apps sharing the same code is a violation of twelve-factor. The solution here is to factor shared code into libraries which can be included through the dependency manager...`

!SLIDE incremental transition=scrollUp

# Base de Código na Prática

Para entender como o fluxo de controle de código atua no Git um bom início é o conteúdo do "git - guia prático" totalmente visual e de fácil compreensão:

 - [git - guia prático](http://rogerdudler.github.io/git-guide/index.pt_BR.html);

 Para os testes a seguir serão usados alguns dos exercícios presentes no conteúdo Git Immersion, uma base um pouco mais técnica que a anterior mas extremamente valiosa para praticar o uso do git:

 - [Git Immersion](http://gitimmersion.com/)

 Outra relevante é a própria documentação do Git e um resumo dos principais recursos adicionado na base de conteúdo da disciplina:

 - [Documentação Oficial: Git --distributed-even-if-your-workflow-isnt](https://git-scm.com/docs) 
 - [Material de apoio do curso sobre Git](https://github.com/fiapsecdevops/classroom/blob/master/content/2gerenciamentodeConfiguracao/2.1git.md)

!SLIDE commandline incremental transition=scrollUp

# Prática, preparando o terreno

Saindo da base sobre o processo de commits os testes a seguir referem-se a prática de algumas operações chave no git, para isso utilize o Git Bash do WIndows ou qualquer outra instalação de sua preferência de acordo com a [Documentação Oficial do Projeto](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git);

Para iniciar execute os seguintes comandos para que o git saiba seu nome e email (Essas informações são necessárias para tracking de alterações):

    $ git config --global user.name "Your Name"
    $ git config --global user.email "your_email@whatever.com"

Utilizando Git Bash do Windows baixe o conteúdo necessário para os testes:

    $ wget https://secdevops.herokuapp.com/file/_files/share/nodeapp.zip
    $ unzip nodeapp.zip

!SLIDE incremental transition=scrollUp

# Prática, Alterarando commits:

Para começar acesse o diretório com o conteúdo baixado e crie um repositório git:

    $ cd nodeapp
    $ git log

Em seguida adicione um arquivo com o conteúdo abaixo e o nome **index.js**:

    @@@shell
    // Default port is 5000
    // Author: You
    
    var express = require('express')
    var app = express()
    ...

!SLIDE incremental transition=scrollUp

# Prática, Alterarando commits:

Faça um commit:

        $ git add index.js
        $ git commit -m "Add comment content"
        $ git log

Considere que faltou alguma alteração no commit anterior e será necessário corrigir mas o objetivo não é gerar um novo commit e sim adicionar o conteúdo que falta (neste caso o email servirá como exemplo):

    @@@shell
    // Default is World
    // Author: You (you@fiap.com.br)
    
    var express = require('express')
    var app = express()
    ...

!SLIDE commandline incremental transition=scrollUp

# Prática, Alterarando commits:

Edite novamente o arquivo de acordo com o conteúdo anterior e adicione utilizando o git "git commit --amend":

    $ git add index.js
    $ git commit --amend -m "Add comment content + author"
    $ git show

Verifique que o conteúdo foi adicionado sobre o commit anterior, esse processo pode ser bem estudado nos tutoriais da Atlassian sobre Git:

[Rewriting history](https://br.atlassian.com/git/tutorials/rewriting-history)


!SLIDE incremental transition=scrollUp

# Prática, Resolução de Conflitos:

Crie uma segunda Branch:

    $ git checkout -b featureA
    $ git status

Modifique o arquivo app.json:

    @@@shell
    {
      "name": "Node.js Sample",
      "description": "A barebones Node.js app using Express 4",
      "original source": "https://github.com/heroku/node-js-sample"
    }

Adicione as novas alterações:

        $ git add app.json
        $ git commit -m "Added app.json content"


!SLIDE incremental transition=scrollUp

# Prática, Resolução de Conflitos:

Volte a branch master e modifique o mesmo arquivo:

        $ git checkout master

Adicione um conteúdo diferente ao arquivo app.json

    @@@shell
    {
        "keywords": ["node", "express", "static"]
    }

Adicione as novas alterações:

        $ git add app.json
        $ git commit -m "Adding keywords and probably creating a conflict"

!SLIDE commandline incremental transition=scrollUp

# Prática, Resolução de Conflitos:

Tente executar um merge com a branch app.json:
    
    $ git merge featureA
    Auto-merging app.json
    CONFLICT (add/add): Merge conflict in app.json
    Automatic merge failed; fix conflicts and then commit the result.    

.callout.info `Neste caso o conflito pode ser resolvido manualmente utilizando o console ou algum editor intuito para isso como o vscode`

Após a resolução do conflito adicione o arquivo e execute o commit finalizando o merge:

    $ git add app.json
    $ git commit

!SLIDE commandline incremental transition=scrollUp

# Prática, Usando o rebase

O processo de rebase é uma ótima saída para evitar conflitos em alterações de código

    $ git checkout experiment
    $ git log
    
Neste exemplo todo o processo de merge anterior será adicionado a essa branch utilizando rebase:

    $ git rebase master
    $ git log

Volte a branch master e faça um merge da branch anterior:

    $ git merge experiments

!SLIDE commandline incremental transition=scrollUp

# Prática, Usando o cherrypick

O Cherrypick é a ação do git que permite adicionar commits de outras branchs sem necessariamente efetuar um merge, ou seja é possível pegar um commit específico e adicionar a sua base de código para uso;

Verifique a diferença para os commits da branch conteiner:

    $ git diff conteiners
    $ git log containers

Adione o commit usado na branch container (Apenas aquele responsável pela criaçã do arquivo Dockerfile):
(Substitua o valor pela identificação do commit)

    $ git cherry-pick xxx
    
    
Verifique que o commit escolhido foi adicionado a sua branch criando o arquivo Dockefile

    $ ls
    $ git log

