# Criando um serviço de integração usando o Github:

1. Para configurar a integração com o GitHub, abra o aplicativo de exemplo [node-sample-app](https://github.com/fiapsecdevops/node-sample-app). Crie um "Fork" deste repositório para sua conta do GitHub (Caso ainda não possua este Fork).

2. Dentro do seu Fork Selecione Configurações ou "Settings" e em seguida proceda conforme abaixo: 

- Selecione **Integrações e Serviços ou "Integrations & Services"** no menu ao lado esquerdo da tela;
- Escolha **Adicionar serviço ou "Add Service"**, em seguida digite Jenkins na caixa de filtro;
- Selecione **Jenkins (GitHub Plugin)**;
- Para a URL do webhook para o Jenkins, digite http://xpto.fiapdev.com/github-webhook/. (Utilize o endereço usado para acesso ao Jenkins);
- **importante:** Certifique-se de incluir a barra à direita (/)
- Finalmente selecione **Adicionar serviço ou "Add Service"**;

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.1-jenkins.png)


## Criação de um Job para validar a integração:

Para validar nossa integração inicial no Jenkins executaremos a criação de um Job:

- Selecione **"New Item"** na página inicial:
- Como nome para o novo item Insira **node-sample-app** no campo **"Enter an item name"**;
- Escolha Projeto **"Freestyle Project"** e selecione **"OK"**;
- Na seção Geral, selecione **"GitHub Project"** e insira a URL do repositório, como por exemplo https://github.com/fiapsecdevops/node-sample-app;
- Na seção **"Source Code Management"**, selecione **Git** e insira a URL .git do repositório, por exemplo, https://github.com/fiapsecdevops/node-sample-app.git **É importante não esquecer fo .git no final**;
- Na seção **"Build Triggers"** selecione **"GitHub hook trigger for GITScm polling"**.
- Na seção **"Build"**, clique em **"Add Build Step"** e selecione **"Execute shell"**, em seguida, digite **echo "Testing"** na janela **command**.
- Salve a alteração na parte inferior da janela de trabalhos.

## Testando a integração com o GitHub;

Para testar a integração do GitHub com o Jenkins, precisaremos criar um evento, isto é executar uma alteração no código;

1. Para executar esse processo volte à interface do GitHub, selecione o repositório e em seguida, localize o arquivo
index.js;

2. Clique no ícone de lápis para editar o arquivo, faça qualquer alteração no arquivo e observe se a alteração execute criará um novo evento em nosso CI.

3. Se o gatilho estiver correto o processo de alteração deverá gerar um evento no Jenkins, esse evento será visível voltando para a tela inicial do Dashboard conforme abaixo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.8-jenkins.png)

4. Alguns pontos relevantes sobre o Laboratório:

- CLicando no nome do envento (Em nosso caso "node-sample-app" é possível visualizar o workspace criado e o tempo usdo no processo de Build. 

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.9-jenkins.png)

- O jenkins usa o termo "Workspace" para definir o espaço onde o código foi copiado e as instruções passadas foram executadas, clicando sobre o Workspace você verá o código da aplicação;

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.10-jenkins.png)

- No canto inferior direito veremos o numero do Job executado cad aalteração no reposítório é um gatilho para iniciar um novo job.

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.10-jenkins.png)

clicando sobre o numero do Job é possível obter mais detalhes como o Output exibindo a mensagem "Testing" no campo ***"Console Output"***.

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.12-jenkins.png)

Próxima Etapa: [Build utilizando Node + Docker + Jenkins](https://github.com/fiapsecdevops/classroom/blob/master/labs/jenkins/04-primeiro-fluxo-usando-jenkins.md);

---

## Referências:

 - Esta aula baseia-se no livro [Continuous Delivery: Reliable Software Releases through Build, Test, and Deployment Automation](https://www.pearson.com/us/higher-education/program/Humble-Continuous-Delivery-Reliable-Software-Releases-through-Build-Test-and-Deployment-Automation/PGM249879.html); 
 
Autores: Jez Humble e David Farley, Editora: Pearson

- Este laboraorio e App baseia-se em um modelo proposto na página da Azure da Microsoft com alterações no formato da aplicação e adequaçãopara AWS: [Criar uma infraestrutura de desenvolvimento em uma VM Linux no Azure com o Jenkins, o GitHub e o Docker](https://docs.microsoft.com/pt-br/azure/virtual-machines/linux/tutorial-jenkins-github-docker-cicd);

---

**Free Software, Hell Yeah!**
