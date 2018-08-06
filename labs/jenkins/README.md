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
pode instalar o Jenkins através da ferramenta yum, pasudo yum remove javara isso basta seguir conforme abaixo:

```sh
{
sudo wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins-ci.org/redhat/jenkins.repo
sudo rpm --import https://jenkins-ci.org/redhat/jenkins-ci.org.key
sudo yum install jenkins -y
}
```

## Executando a instalação do Java (Na versão requerida);

2. Antes de sairmos testando tudo é necessário a correção de uma dependência, a imagem utilizada para estes testes é baseada no Centos que implementa o Java na versão 7 enquanto o Jenkins requer que o Java 8 esteja instalado;

Para executar essa correção execute os comandos abaixo que irão remover o Java 7 e instalar o Java 8 em seguida:

```sh
{
sudo yum remove java -y
sudo yum install java-1.8.0-openjdk -y
}
```

Finalmente inicie o serviço para começarmos a configurar nosso CI:

```sh
sudo service jenkins start
```

A aplicação será incializada utilizando a porta 8080 do servidor, dessa forma abra um navegador Web e vá para
http://:8080 onde concluiremos a configuração inicial do Jenkins:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.1-jenkins.png)

3. A tela acima exige que para fins de segurança seja inserido a senha de administrador inicial, esse dado está armazenado
em um arquivo de texto na sua VM. Use o endereço IP público obtido na etapa anterior para conectar-se à sua VM por SSH
e recolher essa informação;

```sh
 sudo cat /var/lib/jenkins/secrets/initialAdminPassword
```

4. Adicione a chave de segurança e tecle enter, é possível customizar o processo de instalação do Jenkins utilizando
plugins de acordo com o projeto de delivery e com a linguagem de programação, ferramentas e repositórios envolvidos,
em nosso cenário utilizaremos a opção **"Installed Suggested Plugins"**.

5. Por questões de segurança um opicional importante é criar um usuário dentro do Jenkins em vez de continuar usando a
conta de administrador, para criar esta conta de usuário, preencha o formulário conforme as informações solicitadas e quando terminar, clique em Começar a usar o Jenkins:

Obs.: Não é necessário executar alterações no item seguinte referente a configuração da URL de acesso ao Jenkins.

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.2-jenkins.png)

## Criar um webhook do GitHub:

1. Para configurar a integração com o GitHub, abra o aplicativo de exemplo [node-sample-app](https://github.com/fiapsecdevops/node-sample-app). Crie um "Fork" deste repositório para sua conta do GitHub (Caso ainda não possua este Fork).

2. Dentro do seu Fork Selecione Configurações ou "Settings" e em seguida proceda conforme abaixo: 

- Selecione Integrações e Serviços ou "Integrations & Services" no menu ao lado esquerdo da tela;
- Escolha Adicionar serviço ou "Add Service" e, em seguida, digite Jenkins na caixa de filtro;
- Selecione Jenkins (GitHub Plugin);
- Para a URL do webhook para o Jenkins, digite http://<publicIP>:8080/github-webhook/.
- *importante:* Certifique-se de incluir a barra à direita (/)
- Finalmente selecione Adicionar serviço ou "Add Service":

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.1-jenkins.png)


## Criação de um Job para validar a integração:

Para validar nossa integração inicial no Jenkins executaremos a criação de um Job:

- Selecione "New Item" na página inicial:
- Como nome para o novo item Insira HelloWorld no campo "Enter an item name";
- Escolha Projeto "Freestyle Project" e selecione "OK";
- Na seção Geral, selecione "GitHub Project" e insira a URL do repositório, como por exemplo https://github.com/fiapsecdevops/node-sample-app;
- Na seção "Source Code Management", selecione Git e insira a URL .git do repositório, por exemplo, https://github.com/fiapsecdevops/node-sample-app.git
- Na seção "Build Triggers" selecione "GitHub hook trigger for GITScm polling".
- Na seção "BUild", clique em "Add BUild Step" e selecione "Execute shell", em seguida, digite echo "Testing" na janela  command.
- Salve a alteração na parte inferior da janela de trabalhos.

## Testando a integração com o GitHub;

Para testar a integração do GitHub com o Jenkins, precisaremos criar um evento, isto é executar uma alteração no código;

1. Para executar esse processo volte à interface do GitHub, selecione o repositório e em seguida, localize o arquivo
index.js;

2. Clique no ícone de lápis para editar o arquivo, faça qualquer alteração no arquivo e observe se a alteração execute criará um novo evento em nosso CI.

---

## Referências:

 - Esta aula baseia-se no livro [Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation](https://www.pearson.com/us/higher-education/program/Humble-Continuous-Delivery-Reliable-Software-Releases-through-Build-Test-and-Deployment-Automation/PGM249879.html); 
Autores: Jez Humble e David Farley, Editora: Pearson

---

**Free Software, Hell Yeah!**
