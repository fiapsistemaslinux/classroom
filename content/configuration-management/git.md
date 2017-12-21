# Git 

Para nossos testes utilizaremos o git é um derivado do kernel do Linux sendo atualmente a mais famosa ferramenta para versionamento e controle de código sendo utilizado em diversos projetos famosos, alguns deles podem ser conferidos abaixo:

- [Google](https://github.com/google)
- [Facebook](https://github.com/facebook)
- [Rails](https://github.com/rails/rails)
- [Twitter](https://github.com/twitter)
- [Linkedin](https://github.com/linkedin)
- [Netflix](https://github.com/netflix)
- [Microsoft](https://github.com/Microsoft)

---

## Ferramentas Saas para Git 

Saas ou ( **S**oftware **a**s **a** **S**ervice ), esse termo refere-se a ferramentas comercializadas como serviços geralmente baseadas e hospedadas em Cloud Computing, no caso do Git essas ferramentas comerciais proporcionam um meio para armazenamento de repositórios online sendo o maior deles o github;

- [Github](http://www.github.com/)

O Github é um poderoso repositório online, o maior e mais famoso utilizando git, seu uso é gratuito para criação e administração de repositórios abertos, alguns exemplos podem ser encontrados na lista passada anteriromente.

Além do github outras duas ferramentas famosas podem ser boas opções:

- [Bitbucket](https://bitbucket.org/product)

O Bitbucket é um repositório mantido pela Atlassian, sua principal vantagem é a possibilidade de criar repositŕoios fechados para até 5 usuários um recurso que seria pago utilizando o github. Além disso a interface de gerenciamente é intuitiva e simples, o projeto também pode ser implementado como um servidor interno utilizando licenças pagas.

- [Gitlab](https://about.gitlab.com/gitlab-com/)

Fechando esse pequena lista temos o gitlab, um repositório Free que assim como o Bitbucket possui versões para instalação offline, entretanto neste caso com licença gratuita, logo a melhor relação custo benefício caso por algum motivo pretenda manter seu código longe da nuvem.

---

# Instalando e configurando o git

A instalação do git em sistemas linux é relativamente simples estando quase sempre disponível nos repositórios oficiais da distro, siga a [Documentação referente no github.io](https://git-scm.com/download/linux) e tudo deverá funcionar conforme esperado;

Para usuários do windows naturalmente não temos uma SHELL completa que permita a execução nativa, portanto o comum é que se utilize o pacote Git Bash conforme a prórpria documentação [Disponível no github.io](git-for-windows.github.io/), 

Após a instalação execute o git config para definir os campos user.name e  user.email:

```sh
git config --global user.mail "usuario@email.com.br"
git config --global user.name "usuario"
```

## Estados de um repositório

Todo diretório tratado como repositório pelo git possuirá sempre um estado, este estado define como o repositório está em relação ao repositório principal do projeto, na prática temos três possibilidades:

- **working directory:** Representa o estado atual dos arquivos no repositório. 

- **index:** Trata-se de uma area de "staging" que representa uma visão preliminar das modificações a serem integradas projeto;

- **HEAD:**  Versão "em produção" do projeto, funciona como uma referência para comparação com o conteúdo no working directory na execução de commits e merge de alterações;


> Partindo do inicio ao executarmos alterações em conteudos no working directory essa alterações mantem-se localmente até que sejam adicionadas ao index, ( Utilizando a função git add fazemos essa adição ), uma vez que estejam no index essa alterações poderão ser adicionadas ao repositório do projeto a partir de um commit ( Caso estejamos utilizando branchs o processo de merge também será necessário );

---

# Recursos interessantes do Git:

O uso do git vai desde o conteúdo básico presente no processo de commits até algumas possibilidades de nível intermediário e avançado, sendo que algumas delas podem ser realmente úteis no dia a dia, separamos dois ou três destes processos como recomendação de estudos:

---

## O git rebase

O Git rebase é uma poderosa alternativa ao merge no processo de integração de mudanças, a ideia por trás do rebase é alterar a referencia de uma branch evitando conflitos no processo de push e evitando merge de código esse processo é descrito cuidadosamente na documentação do git no scm: [Git Branching - Rebasing](https://git-scm.com/book/en/v2/Git-Branching-Rebasing), vale a pena entender como o reabase atua, pois pode ser muito util e economizar um boa dor de cabeça;


## Trabalhando com Tags

O uso de tags é um recurso muito útil no trbalho colaborativo e na geração de releases, a ideia por trás das tags é que podemos marcar pontos especificos do desenvolvimento que são considerados importantes, esses pontos geração são representados por release de códigos e facilitam o processo de recuperação de versões especificas de seu trabalho; verifique a documentação do git no scm em [Git Basics - Tagging](https://git-scm.com/book/en/v2/Git-Basics-Tagging) e se você nunca utilizou tags essa é uma boa hora para começar a pensar no assunto;

---

## O que exatamente deve ser versionado? ( Na verdade Tudo )

- Todo o código relativo a sua aplicação;
- Todos os scripts de configuração;
- Todo código de implementação interna ( O que chamamos de DSL ou domain-specific language );
- Todos os scripts utilizados para Build de imagens ( Dockerfile por exemplo );
- Todos os metadados ( Json, Yaml etc );
- Todos os scripts de Teste automatizados e TDDs;
- Toda a documentação e procedimentos de configuração ( Esta wiki é um exemplo );
- Todos os templates de modelos de "Infraestructure as a Code" como nosso [cloud-init.txt](https://raw.githubusercontent.com/fiap2tin/devops/master/Lab2.3/cloud-init.txt);
- Todos os templates utilizados em automação como (Cloudformation, Terraform ou Heat);
- Todos os schemas de Databases, configurações e definições de DNS e Firewall;
- ***Basicamente tudo mesmo...***

---

## Material de Referência e Recomendações:

Falando em cursos sobre o uso do git o codeacdemy como sempre oferece uma boa opção:
 - [Codeacademy - Learn Git](https://www.codecademy.com/pt/learn/learn-git)

O Git Immersion voltado é um curso voltado a prática que funciona como um guide line sobre git:
 - [Git Immersion Guide](http://gitimmersion.com/)

No mesmo layout do Git Immersion porém com um formato mais básico temos o TryGit:
- [Trygit](https://try.github.io)

A melhor das referências que já encontrei até aqui, o Guia Prático Git:
 - [Git - Guia Prático](http://rogerdudler.github.io/git-guide/index.pt_BR.html)

Conteúdo oficial do git publicado no formato de um ebooks online:
 - [Git Book](https://git-scm.com/book/pt-br/v2)

Guia de referência Git exemplificando o processo em formato gráfico:
 - [A Visual Git Reference](http://marklodato.github.io/visual-git-guide/index-en.html)

Recentemente descobri um interessante pacote de recursos extras para o git capaz de adicionar features interessantes para usuários intermediários e avançados:
- [Git extras](https://github.com/tj/git-extras)

---

**Free Software, Hell Yeah!**
