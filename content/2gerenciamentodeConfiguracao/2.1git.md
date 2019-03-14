# Git

Para nossos testes utilizaremos o git, atualmente a mais famosa ferramenta para versionamento e controle de código sendo utilizado em diversos projetos famosos como por exemplo:

- [Google](https://github.com/google)
- [Facebook](https://github.com/facebook)
- [Rails](https://github.com/rails/rails)
- [Twitter](https://github.com/twitter)
- [Linkedin](https://github.com/linkedin)
- [Netflix](https://github.com/netflix)
- [Microsoft](https://github.com/Microsoft)

> Na maioria dos casos as empresas que utilizam o git trabalham com o modelo de organizações, dentro dessas organizações esses projetos são disponibilizados em repositórios privados de uso interno ou abertos geralmente com código protejido por licenças baseadas na filosofia Open Source como as licenças [Apache](http://www.apache.org/licenses/LICENSE-2.0) e [GPLv3](https://www.gnu.org/licenses/gpl-3.0.pt-br.html);

## Ferramentas Saas para Git

Saas ou ( **S**oftware **a**s **a** **S**ervice ), esse termo refere-se a ferramentas comercializadas como serviços geralmente baseadas e hospedadas em Cloud Computing, no caso do Git essas ferramentas comerciais proporcionam um meio para armazenamento de repositórios online sendo o github o mais popular atualmente;

- [Github](http://www.github.com/)

O Github é um poderoso repositório online, o maior e mais famoso utilizando git, seu uso é gratuito para criação e administração de repositórios abertos, alguns exemplos podem ser encontrados na lista passada anteriromente.

Além do github outras duas ferramentas famosas podem ser boas opções:

- [Bitbucket](https://bitbucket.org/product)

O Bitbucket é um repositório mantido pela Atlassian, sua principal vantagem é a possibilidade de criar repositórios fechados para até 5 usuários um recurso que seria pago utilizando o github. Além disso a interface de gerenciamento é intuitiva e simples, o projeto também pode ser implementado como um servidor interno utilizando licenças pagas.

- [Gitlab](https://about.gitlab.com/gitlab-com/)

Fechando essa pequena lista temos o gitlab, um repositório Free que assim como o Bitbucket possui versões para instalação offline, entretanto neste caso com licença gratuita, logo a melhor relação custo benefício caso por algum motivo pretenda manter seu código longe da nuvem.

## Instalando e configurando o git

A instalação do git em sistemas linux é relativamente simples estando quase sempre disponível nos repositórios oficiais da distro, siga a [Documentação referente no github.io](https://git-scm.com/download/linux) e tudo deverá funcionar conforme esperado;

Para usuários do windows naturalmente não temos uma SHELL completa que permita a execução nativa, portanto o comum é que se utilize o pacote Git Bash conforme a prórpria documentação [Disponível no github.io](git-for-windows.github.io/).

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

> Partindo do inicio ao executarmos alterações em conteúdos no working directory essas alterações mantem-se em armazenamento local até que sejam adicionadas ao index, (Utilizando a função git add fazemos essa adição), uma vez que estejam no index essa alterações poderão ser adicionada ao repositório do projeto a partir de um commit (Caso estejamos utilizando branchs o processo de merge também será necessário);

## Recursos interessantes do Git

O uso do git vai desde o conteúdo básico presente no processo de commits até algumas possibilidades de nível intermediário e avançado, sendo que algumas delas podem ser realmente úteis no dia a dia, abaixo alguns desses processos são descritos como recomendação de estudos:

### Resolução de Conflitos com merge

O proceso de merge para resolução de conflitos é uma das questões mais importantes sobre o git, afinal acidentes acontecem... principalmente ao se trabalhar com repositórios remotos e branchs de forma colaborativa;

A documentação oficial do git possui uma boa referência sobre o processo de merge e pode ser acessada neste endereço: [https://git-scm.com/docs/git-merge](https://git-scm.com/docs/git-merge);

### O git rebase

O Git rebase é uma poderosa ferramenta de auxilio e otmização de seus processos de merge entre branchs podendo ser muito útil na reestruturação de commits, ou seja, a partir dele é possível modificar a quantidade de commits que envolveram uma determinada alteração, assim em um cenário onde vários commits foram feitos podemos usar o rebase para mandar isso ao repositório principal remoto como um único commit por exemplo;

Outra função muito útil no processo de rebase é a integração de mudanças, a ideia por trás do rebase é alterar a referencia de uma branch evitando conflitos no processo de push e evitando merge de código;

Você encontrará mais detalhes na documentação do git no scm: [Git Branching - Rebasing](https://git-scm.com/book/en/v2/Git-Branching-Rebasing).

Vale a pena entender como o reabase atua, pois pode ser muito util e economizar um boa dor de cabeça;

### Trabalhando com Tags

O uso de tags é um recurso muito útil no trbalho colaborativo e na geração de releases, a ideia por trás das tags é que podemos marcar pontos especificos do desenvolvimento que são considerados importantes, esses pontos geralmente são representados por release de códigos e facilitam o processo de recuperação de versões especificas de seu trabalho; verifique a documentação do git no scm em [Git Basics - Tagging](https://git-scm.com/book/en/v2/Git-Basics-Tagging) e se você nunca utilizou tags essa é uma boa hora para começar a pensar no assunto;

### Usando o cherry-pick para manipulação avançada

O recurso cherry pick do git é uma ferramenta avançada útil em processos onde é necessário adicionar apenas alguns commits de uma determinada branch em outra;

> A diferença básica para o rebase é que usando o rebase ou um processo padrão de merge todos os commits de uma branch são aplicados a branch de destino,  com o cherry-pick é possível que somente alguns commits sejam aplicados em outra branch.

***Quando utilizar o cherry-pick?***

Um dos casos mais comuns para uso do cherry-pick é em situações onde um pull request ou um merge entre branchs  será recusado, porém existem commits com código que podem ser aproveitados. Neste caso estes commits teria mde ser isolados e importados pra dentro da sua branch atual, dai o uso do cherry-pick.

## Material de Referência e Recomendações

Conforme descrito acima a Alura oferece um interessante curso sobre git que pode ser obtido no endereço abaixo:

 - [Curso de git Alura](https://www.alura.com.br/curso-online-git);

O Git Immersion é um curso voltado a prática que funciona como um guide line sobre git:
 - [Git Immersion Guide](http://gitimmersion.com/)

No mesmo layout do Git Immersion porém com um formato mais básico temos o TryGit:
 - [Trygit](https://try.github.io)

A melhor das referências que já encontrei até aqui, o Guia Prático Git:
 - [Git - Guia Prático](http://rogerdudler.github.io/git-guide/index.pt_BR.html)

Conteúdo oficial do git publicado no formato de um ebook online:
 - [Git Book](https://git-scm.com/book/pt-br/v2)

Guia de referência Git exemplificando o processo em formato gráfico:
 - [A Visual Git Reference](http://marklodato.github.io/visual-git-guide/index-en.html)

Recentemente descobri um pacote de recursos extras para o git capaz de adicionar features interessantes para usuários intermediários e avançados:
- [Git extras](https://github.com/tj/git-extras)

---

**Free Software, Hell Yeah!**
