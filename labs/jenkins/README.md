# Criando um modelo de CI com Jenkins

---

O template abaixo executará o lançamento de uma instância na AWS utilizando Cloud Formation, esta instância "nasce" com o Docker Community instalado na versão 17, com Jenkins para testes de configuração de modelos de delivery contínuo e com acesso configurado para um usuário local;

Clique no link abaixo caso deseja utilizar este template:

[![cf-template](https://s3.amazonaws.com/cloudformation-examples/cloudformation-launch-stack.png)](https://console.aws.amazon.com/cloudformation/home?region=us-east-2#/stacks/new?stackName=sandboxDocker&templateURL=https://s3.us-east-2.amazonaws.com/cf-templates-fiaplabs/dockermachine-aws-tmpl.json)


***Importante:***

Para utilizar o template é necessário acesso a uma conta válida na AWS, se for necessário o uso fora dos laboratórios de aula será necessário o cadastro de uma [Free Tier](https://aws.amazon.com/pt/free/) ou de algum outro modelo de conta disponivel. 

---

## Referências:

 - Esta aula baseia-se no livro [Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation](https://www.pearson.com/us/higher-education/program/Humble-Continuous-Delivery-Reliable-Software-Releases-through-Build-Test-and-Deployment-Automation/PGM249879.html); 
Autores: Jez Humble e David Farley, Editora: Pearson

---

**Free Software, Hell Yeah!**
