# Criando um modelo de CI com Jenkins

**Afinal o que é o Jenkins?**

O Jenkins é uma aplicação opensource baseado em java utilizado no processo de automação de tarefas, essas tarefas vão desde o processo de building de código até testes automatizados e deploys em ambientes de produção, sua instalação necessita apenas de ambiente com Java e pode ser executada na mairia dos sistemas operacionais atuais ou a partir de containers enquanto a arquitetura pode ser distribuida ou no formato standalone com apenas uma VM.

> Em nosso cenário o Jenkins foi a solução escolhida como ferramenta para implementação de testes para delivery/deploy continuo de uma aplicação simples baseada em nodejs.

O processo de instalação do Jenkins no formato standalone, ou seja, utilizando apenas um servidor é relativamente simples,
basta seguir a documentação oficial no site do Projeto atráves da URL [jenkins.io/doc](https://jenkins.io/doc/book/getting-started/installing/).

**Preparação de Ambiente:**

O template abaixo executará o lançamento de uma instância na AWS utilizando Cloud Formation, esta instância "nasce" com o Docker Community instalado na versão 17 e com acesso configurado para um usuário local, neste momento faremos a instalação manual do Jenkins para fins didáticos, com base na documentação oficial do projeto disponível na [Wiki do Projeto Jenkins](https://wiki.jenkins.io/display/JENKINS/Installing+Jenkins+on+Red+Hat+distributions);


Clique no link abaixo caso deseje utilizar este template:

[![cf-template](https://s3.amazonaws.com/cloudformation-examples/cloudformation-launch-stack.png)](https://console.aws.amazon.com/cloudformation/home?region=us-east-2#/stacks/new?stackName=sandboxDocker&templateURL=https://s3.us-east-2.amazonaws.com/cf-templates-fiaplabs/dockermachine-aws-tmpl.json)

## Executando a instalação do Jenkins

1. Para executar a instalação em distribuições baseadas na família RedHat, como nosso recém configurado servidor, você
pode instalar o Jenkins através da ferramenta yum, para isso basta seguir conforme abaixo:

```sh
{
sudo wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins-ci.org/redhat/jenkins.repo
sudo rpm --import https://jenkins-ci.org/redhat/jenkins-ci.org.key
sudo yum install jenkins
}
```

---

## Referências:

 - Esta aula baseia-se no livro [Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation](https://www.pearson.com/us/higher-education/program/Humble-Continuous-Delivery-Reliable-Software-Releases-through-Build-Test-and-Deployment-Automation/PGM249879.html); 
Autores: Jez Humble e David Farley, Editora: Pearson

---

**Free Software, Hell Yeah!**
