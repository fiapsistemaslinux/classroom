# Packages e Repositóries

---

Pré-requisitos:

Execução de uma instância rodando Jenkins como instalação de plugins recomendados e instalação do [Maven Project Plugin](https://wiki.jenkins.io/display/JENKINS/Maven+Project+Plugin);

---

Instalação dos Pacotes

Para execução de testes de build de projetos utilizaremos como base o sistema operacional ubuntu, primeiro faça a instalação das ferramentas de build ant e maven:

```sh
# sudo apt install ant maven unzip -y
```

Acesse o [site](https://www.jfrog.com/open-source/) do Projeto jfrog e faça o download da ultima versão:

```sh
# unzip jfrog-artifactory-oss-5*
# mkdir -p /var/opt/jfrog/artifactory
# cp -a artifactory-oss-5*/ /var/opt/jfrog/artifactory/
# ls -l /var/opt/jfrog/artifactory
```

Em seguida execute a instalação usando o instalador automática descompactado:


```
# . /var/opt/jfrog/artifactory/bin/installService.sh
```

Finalmente inicialize o serviço executando:

```
# systemctl start artifactory.service
```

---

## Material de Referência:

Existem inumeras referências para consulta sobre esse assunto, no escopo deste material fizemos um overview bem simples mas para aqueles que quiserem se aprofundar um pouco mais na toca do coelho fica as recomendações abaixo:

Este guide sobre terraform explica de forma sucinta porem bem esclarecedora a diferença entre ferramentas de automação e de gerenciamento de configuração, neste caso em específico a escolha é voltada para o terraform, mas vale entender as argumentações e as motivações para essa escolha:

* [A Comprehensive Guide to Terraform](https://blog.gruntwork.io/why-we-use-terraform-and-not-chef-puppet-ansible-saltstack-or-cloudformation-7989dad2865c)

----

**Free Software, Hell Yeah!**
