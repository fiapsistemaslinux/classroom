# Build utilizando Node + Docker + Jenkins

Tendo criado e validado a comunicação entre o Jenkins e o repositório Git esse é o momento para testarmos nosso primeiro fluxo que consiste no processo de build de uma aplicação básica escrita em node utilizando Docker em um fluxo automatizado;

> Neste modelo a arquitetura da aplicação foi simplicada a ponto de utilizarmos o mesmo node responsável pelo ci como ambiente para execução da aplicação, o uso do docker entra como um facilitador a fim de que, não seja necessário configurar uma versão node especifica para este teste.

## Reconfigurando o processo de Build

1. Na etapa anterior, você criou uma regra de build básica do Jenkins que gera uma mensagem para o console. Iremos alterar essa etapa de build para usar nosso Dockerfile e executar o app em node.

- Em sua instância do Jenkins, volte a tela inicial, selecione o Job que você criou na etapa anterior. 

- Selecione a opção **"Configure ou Configurar"** no  painél do lado esquerdo e role para baixo até a seção **"Build"**:

- Remova sua etapa de build **echo "Testing"** selecionando a cruz vermelha no canto superior direito da caixa da etapa de build existente;

- Escolha **Adicionar etapa de build** e, em seguida, selecione **Executar shell**;

- Na caixa Comando, insira os comandos de build usando Docker:

```sh
docker build --tag node-sample-app:$BUILD_NUMBER .
docker stop node-sample-app && docker rm node-sample-app
docker run -d --name node-sample-app -p 5000:5000 -e PORT=5000 node-sample-app:$BUILD_NUMBER
```

- A seguir e então selecione "Salvar" e volte a tela inicial;

> As etapas de build do Docker criam uma imagem e adicionam uma TAG com o número de build do Jenkins para que você possa manter um histórico de versões se necessário, qualquer contêiner existente executando o app é interrompido e, em seguida, removido. um novo contêiner é então iniciado usando a imagem e executa o app Node.js com base nas versão entre pela integração com o GitHub, em nosso exemplo o App será acessível a partir da porta 9090;

## Validando o Build da aplicação:

1. Após alterar o processo de Build faça um commit no repositório iniciando um novo gatilho;

2. Abra um navegador e insira o endereço ip da instancia no formato http://xpto.fiapdev.com:5000

3. Seu app deverá ser exibido refletindo a versão mais recente baseada em seu Fork no GitHub:

---


## Referências:

 - Esta aula baseia-se no livro [Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation](https://www.pearson.com/us/higher-education/program/Humble-Continuous-Delivery-Reliable-Software-Releases-through-Build-Test-and-Deployment-Automation/PGM249879.html); 
Autores: Jez Humble e David Farley, Editora: Pearson

 - Este laboraorio e App baseia-se em um modelo proposto na página da Azure da Microsoft com alterações no formato da aplicação e adequaçãopara AWS: [Criar uma infraestrutura de desenvolvimento em uma VM Linux no Azure com o Jenkins, o GitHub e o Docker](https://docs.microsoft.com/pt-br/azure/virtual-machines/linux/tutorial-jenkins-github-docker-cicd);

---

**Free Software, Hell Yeah!**
