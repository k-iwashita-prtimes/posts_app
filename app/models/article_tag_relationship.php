<?php
require_once 'model.php';
class ArticleTagRelationship extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    function create($selected_tags, $article_id)
    {
        $statement = $this->db->prepare('INSERT INTO article_tag_relationships SET article_id= :article_id, tag_id= :tag_id');
        foreach ($selected_tags as $tag_id) {
            $statement->bindParam(':article_id', $article_id);
            $statement->bindParam(':tag_id', $tag_id);
            $statement->execute();
        }
    }
}
