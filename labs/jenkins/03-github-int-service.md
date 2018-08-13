# Criando um serviço de integração usando o Github:

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