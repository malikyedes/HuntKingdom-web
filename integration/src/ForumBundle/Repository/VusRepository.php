<?php



namespace ForumBundle\Repository;





class VusRepository extends \Doctrine\ORM\EntityRepository{


    public function findTitreSQD_NAME($titre)
    {
        $query=$this->getEntityManager()->createQuery("select m from ForumBundle:Publication m where m.titre =?1 ");
        $query->setParameter(1,$titre);
        return $query->getResult();
    }


    public function countViews($idpb)
    {
        $query=$this->getEntityManager()->createQuery("select COUNT(m.idView) from ForumBundle:Vus m where m.idPb =?1 ");
        $query->setParameter(1,$idpb);
        return $query->getSingleResult();

    }

    public  function countViewUser($idpb,$idUsers)
    {
        $query=$this->getEntityManager()->createQuery("select COUNT(m.idView) from ForumBundle:Vus m where m.idPb =?1 and m.idUsers =?2 ");

        $query->setParameter(1,$idpb);
        $query->setParameter(2,$idUsers);
        return $query->getSingleResult();
    }


}



