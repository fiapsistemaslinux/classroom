# Inicialização
    
O processo de inicialização do Jenkis utilizando template configurou um DNS e um endereço de acesso com proxy através da porta 80 para a porta real da aplicação, sendo assim uma vez instalado acesse http://xpto.fiapdev.com para concluir o processo.

> Já para a instalação manual a aplicação será incializada utilizando a porta 8080 do servidor dessa forma acesse http://<end-ip-da-instancia-ou-vm>:8080

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.1-jenkins.png)

1. A tela acima exige que para fins de segurança seja inserido a senha de administrador inicial, esse dado está armazenado em um arquivo de texto na sua VM. 

Caso tenha utilizado o template de instalação **essa informação será enviada em até 10 minutos para o endereço de email Fake cadastrado.**

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.6-jenkins.png)


*Apenas para instalações manuais sem o template*:

Para instalações manuais será necessário acesso ao terminal de comandos para recuperar esse dado, use o endereço IP público obtido na instalação e a chave configurada para conectar-se à sua VM por SSH e recolher essa informação:

```sh
 sudo cat /var/lib/jenkins/secrets/initialAdminPassword
```

2. Adicione a chave de segurança e tecle enter, é possível customizar o processo de instalação do Jenkins utilizando plugins de acordo com o projeto de delivery e com a linguagem de programação, ferramentas e repositórios envolvidos, em nosso cenário utilizaremos a opção **"Installed Suggested Plugins"**.

3. Por questões de segurança um opicional importante é criar um usuário dentro do Jenkins em vez de continuar usando a conta de administrador, para criar esta conta de usuário, preencha o formulário conforme as informações solicitadas e quando terminar, clique em **"Começar a usar o Jenkins"**:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.6-jenkins.png)

4. Por fim você será questionado sobre a URL de acesso ao Jenkins, não é necessário executar alterações neste item, apenas clique em "SAve & Finish";

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.1.2-jenkins.png)

Próxima Etapa: [Criando um serviço de integração usando o Github](https://github.com/fiapsecdevops/classroom/blob/master/labs/jenkins/03-github-int-service.md)

---

## Referências:

 - Wiki do Projeto Jenkins [Installing Jenkins](https://wiki.jenkins.io/display/JENKINS/Installing+Jenkins); 

---

**Free Software, Hell Yeah!**
