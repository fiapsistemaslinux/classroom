# Gerenciamento de configurações

O termo **"Gerenciamento de Configuração" refere-se ao processo a partir do qual os componentes relevantes ao seu projeto e suas respectivas dependências são armazenadas, identificadas e modificadas,** essa lógica é amplamente usada na área de desenvolimento e automação, podendo ser aplicada em diversas esferas, no caso do desenvolvimento a maior prática relacionada ao gerenciamento de configuração seria o versionamento de código.

> Definir uma estratégia para gerenciamento de configuração é algo essencial para uma boa cultura de desenvolvimento, sendo a partir deste ponto que começaremos a pensar em questões como o fluxo para execução de mudanças, evolução e ciclo de desenvolvimento de aplicações além do modelo de colaboração e organização do time de desenvolvimento envolvido.


**Como saber se estamos no caminho certo**

No livro Continuos Delivery Humble e Farley propõem três perguntas simples para determinar e você e seu time estão no caminho certo em relação a gerenciamento de configurações:

<script>(function(t,e,s,o){var n,c,l;t.SMCX=t.SMCX||[],e.getElementById(o)||(n=e.getElementsByTagName(s),c=n[n.length-1],l=e.createElement(s),l.type="text/javascript",l.async=!0,l.id=o,l.src=["https:"===location.protocol?"https://":"http://","widget.surveymonkey.com/collect/website/js/tRaiETqnLgj758hTBazgd27ODV48Ag_2BzmaWmdUAYIoLLRz4OJ2Lu3_2BZ9Ge7KWD_2BL.js"].join(""),c.parentNode.insertBefore(l,c))})(window,document,"script","smcx-sdk");</script>


É improvável que você consiga 5 corações para cada uma dessas perguntas mas isso nem mesmo é necessário, a idéia base por trás do questionário é export alguns pontos importantes diretamente relacionados a gerenciamento de configuração e a cultura devops, Aliás boa parte das respostas sobre como conseguir os 5 corações para cada uma dessas questões será trabalhada neste conteúdo.

## Começando pelo controle de Versões

Quando o assunto é desenvolvimento ao considerar a visão e o foco dividido em vários projetos e quantidade de mãos atuando em uma mesma tarefa ou as etapas envolvidas é quase intuitivo que se utilize algum modelo de repositório para armazenamento e gerencimaneto de código, esses repositórios são o que chamamos de **repositórios de código**, a idéia base é armazenar seu trabalho em um local mais seguro e mais resiliente que um pen-drive.

### Ferramentas de Controle de Versão

A maioria dos repositórios utiliza alguma arquitetura baseada em um centralizador, os mais antigos trabalhavam com servidores que faziam essa função utilizando protocolos como FTP, outros implementam tecnologias próprias e esquemas próprios para transporte e controle de dados baseando-se em protocolos como HTTPS e SSH eis alguns exemplos:

- [Git](https://git-scm.com/)
- [Marcurial](https://pypi.python.org/pypi/Mercurial)
- [Team Foundation Server](https://www.visualstudio.com/team-services/)
- [SVN](https://subversion.apache.org/)
- [CVS](https://sourceforge.net/p/mx4j/cvs/)

---

### O que exatamente deve ser versionado? ( Na verdade Tudo )

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

Esse ebook publicado pelo pessoal da codeship descreve qual a abordagem e experiência pessoal deles em relação a versionamento de código:
- [Efficiency in Development Workflows](https://resources.codeship.com/ebooks/efficiency-in-development-workflows?hsCtaTracking=282b4efb-3636-4833-84fb-19eae59ac503%7Ccd120a13-d5bb-434f-9295-b414729901a9)
 
---

**Free Software, Hell Yeah!**
