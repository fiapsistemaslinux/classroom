// Recuperando o parâmetro $name de uma HTTP request...
$name = $_REQUEST("name");
// Configurando a Quey para busca por um suposto campo SSN...
// Neste caso utilizando uma Intrução Preparada ( Prepared Statement ) e fazendo bind no parâmetro name:
$query = $dbhandle->prepare("select ssn from customers where name = ?")
// Agora executamos a consulta, substituindo a variável "$name" usando
// um array para alimentar a API:
$query->execute($query,array($name));
// Recuperando os dados de nossa SSN como resultado da query...
$ssn->$query->fetchAll();
