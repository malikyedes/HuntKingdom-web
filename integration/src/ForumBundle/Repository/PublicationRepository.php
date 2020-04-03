<?php

namespace ForumBundle\Repository;


class PublicationRepository extends \Doctrine\ORM\EntityRepository{

    public function findTitreSQD_NAME($titre,$pd)
    {
        $query=$this->getEntityManager()->createQuery("select m from ForumBundle:Publication m where m.titre =?1 ");
        $query->setParameter(1,$titre);
        return $query->getResult();
    }
    public function find_article_user($idUser)
    {
        $query=$this->getEntityManager()->createQuery("select  m from ForumBundle:Publication m where m.ID_USERS =?1   ")->setMaxResults(3);
        $query->setParameter(1,$idUser);
        return $query->getResult();
    }
    public function findCommentSQD_Forum($id)
    {
        $query=$this->getEntityManager()->createQuery("select m from ForumBundle:Commentaire m where m.idPb =?1 ORDER BY m.addedIn ASC ");
        $query->setParameter(1,$id);
        return $query->getResult();
    }


}
