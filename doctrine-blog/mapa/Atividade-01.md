# Atividade 01

Adicionar ao projeto a funcionalidade de possibilitar 
o vínculo entre um post e uma categoria sendo que

- um post terá sempre uma categoria ou nenhuma, ou seja, não é obrigatória
- uma categoria poderá estar vinculada a vários posts

Em Entity:
- Criar uma entidade (classe Category) para tabela de categoria (tabela category)
- Adicionar a classe Post o vínculo com Category
- Atualizar o banco de dados e garantir que manutenção foi bem sucedida

Crie um repositório para Category e:
- Crie um método chamado findPostsByCategory($category)
que retorne todos os posts de determinada categoria
- O retorno deste método deve ser similar ao de tags 
usando o método $this->getPaginator da abstração de repositório.
