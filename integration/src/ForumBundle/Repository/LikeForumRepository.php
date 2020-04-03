<?php
namespace ForumBundle\Repository;


class LikeForumRepository extends \Doctrine\ORM\EntityRepository{

    public function countLike($idpb)
    {
        $query=$this->getEntityManager()->createQuery("select COUNT(m.idLike) from ForumBundle:LikeForum m where m.idPb =?1 ");
        $query->setParameter(1,$idpb);
        return $query->getSingleResult();

    }

    public  function countLikeUser($idpb,$idUser)
    {
        $query=$this->getEntityManager()->createQuery("select COUNT(m.idlike) from ForumBundle:LikeForum m where m.idPb =?1 and m.ID_USERS =?2 ");

        $query->setParameter(1,$idpb);
        $query->setParameter(2,$idUser);
        return $query->getSingleResult();
    }
    public function findCommentSQD_Forum($id)
    {
        $query=$this->getEntityManager()->createQuery("select m from ForumBundle:Commentaire m where m.idPb& =?1 ORDER BY m.addedIn ASC ");
        $query->setParameter(1,$id);
        return $query->getResult();
    }






}
