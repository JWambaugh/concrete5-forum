<?php

namespace Concrete\Package\OrticForum\Src\Entity;

/**
 * @Entity
 * @Table(name="OrticForumMessages")
 */
class ForumMessage
{
    /**
     * @Id
     * @Column(name="mID", type="integer", options={"unsigned"=true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $ID;

    /**
     * @Column(name="cID", type="integer", options={"unsigned"=true})
     */
    protected $pageId;

    /**
     * @Column(name="uID", type="integer", options={"unsigned"=true})
     */
    protected $userId;

    /**
     * @Column(name="parentMessageID", nullable=true, type="integer", options={"unsigned"=true})
     */
    protected $parentId;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $subject;

    /**
     * @Column(type="string", nullable=true)
     */
    protected $slug;

    /**
     * @Column(type="text")
     */
    protected $message;

    /**
     * @Column(type="datetime")
     */
    protected $dateCreated;

    /**
     * @Column(type="datetime")
     */
    protected $dateUpdated;

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     * @return ForumMessage
     */
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPageId()
    {
        return $this->pageId;
    }

    /**
     * @param mixed $pageId
     * @return ForumMessage
     */
    public function setPageId($pageId)
    {
        $this->pageId = $pageId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return ForumMessage
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     * @return ForumMessage
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     * @return ForumMessage
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     * @return ForumMessage
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return ForumMessage
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     * @return ForumMessage
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @param mixed $dateUpdated
     * @return ForumMessage
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
        return $this;
    }

}