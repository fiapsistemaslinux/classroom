# Preparação de Ambiente

O template abaixo executará o lançamento de uma instância na AWS utilizando Cloud Formation, esta instância "nasce" com o Docker Community instalado na versão 17 e com acesso configurado para um usuário local, neste momento faremos a instalação manual do Jenkins para fins didáticos, com base na documentação oficial do projeto disponível na [Wiki do Projeto Jenkins](https://wiki.jenkins.io/display/JENKINS/Installing+Jenkins+on+Red+Hat+distributions);


Clique no link abaixo caso deseje utilizar este template:

[![cf-template](https://s3.amazonaws.com/cloudformation-examples/cloudformation-launch-stack.png)](https://console.aws.amazon.com/cloudformation/home?region=us-east-2#/stacks/new?stackName=sandboxDocker&templateURL=https://s3.us-east-2.amazonaws.com/cf-templates-fiaplabs/jenkinsmachine-aws-tmpl.json)


> Ao inicializar o template clicando no Link acima é necessário que esteja logado em uma conta na AWS, utilize as informações de autenticação fornecidas pelo professor;

---

A tela exibida após o lauch deve ser similar a este modelo:

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.2-jenkins.png)


1. Preencha os campos que seguem conforme forém requeridos:

| Nome do Campo      | Preehcnimento    | Descrição |
|--------------------|------------------|-----------|
| Stack name         | RMXXX-JENKINS  | Nome do Stack no Cloud Formation                       |
| AdminSecurityGroup | default          | Grupo de Seg. com regras de Firewall para Acesso a App |
| DnsPrefix          | xpto             | Definir um nome para acesso a aplicação (Dois alunos NÃO podem usar o mesmo nome)    |
| DnsZone            | fiapdev.com      | Zona onde o dominio de acesso será cadastrado, por exemplo  "xpto.fiapdev.com"       |
| EmailAddress       | fakemail*        | Verificar instruções sobre como criar um email fake para este lab ao final da página |
| InstanceType       | t2.small         | Tamanho da instância usada para o Laboratório, não é necessário alterar.             |
| IPWhitelist        | 0.0.0.0/0        | Endereço de DNS para restrição de acesso, utilziar o valor sugerido em aula ou o valor default 0.0.0.0   |
| S3Bucket           | fiapdev-jenkins  | Bucket de S3 usado para Bucket e restore de setup do Jenkins via Groove                                  |
| S3Prefix           |                  | Manter em branco ou preencher segundo orientações do professor                                           |
| SshKey             | id_fiap          | Chave para acesso manual a instancia via SSH                                                             |
| Subnets            |                  | Preencher com todos os valores disponíveis no campo (Será liberada acesso para todas as zoans da conta ) |
| VpcId              |                  | Preecher com o valor sugerido no campo (Será usado a VPC padrão da conta)                                |

**Fake Mail:**

> Para acessar a instalação inicial do Jenkins será necessário preenchimento de um endereço de e-mail para o qual será enviado o AdminSecretKey gerado durante a instalação, é possível criar um email fake apenas com a finalidade de entregar este laboratório, para isso acesso o serviço: [https://temp-mail.org/pt/](https://temp-mail.org/pt/) utilize o endereço no topo da tela no campo "Email Address";

2. Após executar a configuração inicial clique no botão **"Next"**;

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.3-jenkins.png)


3. Na tela que segue não é necessário adicionar Tags a configuração, apenas siga novamente para a a tela **"Review"**;

4. Nesta etapa revise os dados passados de acordo com a tabela acima (chame o professor se necessário),

5. Em seguida marque a opção "I acknowledge that AWS CloudFormation might create IAM resources";

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.4-jenkins.png)

6. Clique em **"Create"** e aguarde a conclusão do Setup via CloudFormation;

![alt tag](https://github.com/fiapsecdevops/classroom/raw/master/labs/images/1.2.5-jenkins.png)

> Aguarde enquanto o template é aplicado os próximos passos serão a configuração da ferramenta siga para a etapa seguinte para executar este processo;

Próxima Etapa: [Inicialização do Jenkins](https://github.com/fiapsecdevops/classroom/blob/master/labs/jenkins/02-setup-jenkins.md)
