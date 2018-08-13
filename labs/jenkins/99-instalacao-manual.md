# Executando a instalação do Jenkins

A instalação manual do Jenkins é relativamente simples podendo ser executada com base na documentação oficial do projeto disponível na [Wiki do Projeto Jenkins](https://wiki.jenkins.io/display/JENKINS/Installing+Jenkins);

Abaixo seguem detalhes do processo de instação nas principais Familias Linux

> Pendente adicionar informações sobre execução direta do Jenkins usando Containers;

---

## RedHat:

1. Para executar a instalação em distribuições baseadas na família RedHat, como nosso recém configurado servidor, você
pode instalar o Jenkins através da ferramenta yum, pasudo yum remove javara isso basta seguir conforme abaixo:

```sh
{
sudo wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins-ci.org/redhat/jenkins.repo
sudo rpm --import https://jenkins-ci.org/redhat/jenkins-ci.org.key
sudo yum install jenkins -y
}
```

**Executando a instalação do Java (Na versão requerida):**

Antes de sairmos testando tudo é necessário a correção de uma dependência, a imagem utilizada para estes testes é baseada no Centos que implementa o Java na versão 7 enquanto o Jenkins requer que o Java 8 esteja instalado;

2. Para executar essa correção execute os comandos abaixo que irão remover o Java 7 e instalar o Java 8 em seguida:

```sh
{
sudo yum remove java -y
sudo yum install java-1.8.0-openjdk -y
}
```

3. Finalmente inicie o serviço para começarmos a configurar nosso CI:

```sh
{
sudo service jenkins start   # Para distribuições que utilizem o sistema de gerenciamento System V como o Amazon Linux ou CentOS 6
sudo chkconfig jenkins on
}
```

```sh
{
sudo systemctl start jenkins  # Para distribuições que utilizem o sistema de gerenciamento SystemD como o CentOS 7
sudo systemctl enable jenkins
}
```

---

## Debian/Ubuntu

Para executar a instalação em distribuições baseadas em Debian, você pode utilizar a ferramenta apt, um gerenciador de pacotes da Fámilia Debian Ubuntu, o processo de instalação usando o apt é bem simples uma vez que está bem documentado, basta seguir conforme abaixo:

1. A instalação do Jenkins exige que uma VM JDK e JRE esteja instalada, proceda da seguinte forma para resolver essa dependencia:

```sh
{
sudo add-apt-repository ppa:openjdk-r/ppa  
sudo apt-get update
sudo apt-get install openjdk-8-jdk
}
```

2. Reconfigure o sistema para utilizar o Java 8 como padrão executando o comando a seguir:

```sh
{
sudo update-alternatives --config java
}
```

3. Em seguida adicione o repositório e execute a instalação dos pacotes solicitados:

```sh
{
wget -q -O - https://pkg.jenkins.io/debian/jenkins-ci.org.key | sudo apt-key add -
sudo sh -c 'echo deb http://pkg.jenkins.io/debian-stable binary/ > /etc/apt/sources.list.d/jenkins.list'
sudo apt-get update
sudo apt-get install jenkins
}
```

3. Finalmente inicie o serviço para começarmos a configurar nosso CI e habilite sua inicialização automática:


```sh
{
sudo systemctl enable jenkins
sudo systemctl start jenkins
}
```

---

## Inicialização
    
> O processo de inicialização é o mesmo processo para qualquer processo de instalação descrito acima)


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

---

## Referências:

 - Wiki do Projeto Jenkins [Installing Jenkins](https://wiki.jenkins.io/display/JENKINS/Installing+Jenkins); 

---

**Free Software, Hell Yeah!**