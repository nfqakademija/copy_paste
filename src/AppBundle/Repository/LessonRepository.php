<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Lesson;

/**
 * LessonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LessonRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLessonByTime($now)
    {
        return $this->createQueryBuilder('l')
            ->andWhere(':currentTime BETWEEN l.startTime AND l.endTime')
            ->setParameter('currentTime', $now)
            ->getQuery()
            ->getSingleResult()
        ;
    }

    /**
     * Finds next lesson by given id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function findNextLesson($id)
    {
        return $this->createQueryBuilder('a')
            ->setParameter('id', $id)
            ->leftJoin(Lesson::class, 'b', 'WITH', 'b.id = :id')
            ->where('a.startTime >= b.endTime')
            ->orderBy('a.startTime')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }

    /**
     * Finds previous lesson by given id
     *
     * @param  mixed $id
     * @return mixed
     */
    public function findPrevLesson($id)
    {
        return $this->createQueryBuilder('a')
            ->setParameter('id', $id)
            ->leftJoin(Lesson::class, 'b', 'WITH', 'b.id = :id')
            ->where('a.endTime <= b.startTime')
            ->orderBy('a.startTime', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
