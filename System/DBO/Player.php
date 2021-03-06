<?php

namespace Quantum\DBO;

use Quantum\Core;

class Player {
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $account_id;

    /**
     * @var integer
     */
    protected $name;

    /**
     * @var integer
     */
    protected $job;

    /**
     * @var integer
     */
    protected $playtime;

    /**
     * @var integer
     */
    protected $level;

    /**
     * @var integer
     */
    protected $exp;

    /**
     * @var integer
     */
    protected $gold;

    /**
     * @var \DateTime
     */
    protected $last_play;

    /**
     * @var integer
     */
    protected $alignment;

    /**
     * @var null|Guild
     */
    protected $guild;

    /**
     * @var null|Account
     */
    protected $account;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAccountId() {
        return $this->account_id;
    }

    /**
     * @param int $account_id
     */
    public function setAccountId($account_id) {
        $this->account_id = $account_id;
    }

    /**
     * @return string
     */
    public function getAccountName() {
        $this->loadAccount();

        if($this->account == null) {
            return '';
        } else {
            return $this->account->getLogin();
        }
    }

    /**
     * @return int
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param int $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getJob() {
        return $this->job;
    }

    /**
     * @param int $job
     */
    public function setJob($job) {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getJobDisplay() {
        return Core::getInstance()->getTranslator()->translate('system.jobs.' . $this->job);
    }

    /**
     * @return string
     */
    public function getTranslatedJob() {
        return Core::getInstance()->getTranslator()->translate('system.jobs.' . $this->job);
    }

    /**
     * @return int
     */
    public function getPlaytime() {
        return $this->playtime;
    }

    /**
     * @param int $playtime
     */
    public function setPlaytime($playtime) {
        $this->playtime = $playtime;
    }

    /**
     * @return int Human read able time (minutes / hours / days)
     */
    public function getPlaytimeHuman() {
        $translator = Core::getInstance()->getTranslator();
        if($this->playtime < 60) {
            return $this->playtime . ' ' . $translator->translate('system.time.minutes');
        } else {
            $hours = floor($this->playtime / 60);
            $minutes = $this->playtime % 60;

            if($hours > 24) {
                $days = floor($hours / 24);
                $hours = $hours % 24;

                return $days . ' ' . $translator->translate('system.time.days') . ' ' .
                    $hours . ' ' . $translator->translate('system.time.hours') . ' ' .
                    $minutes . ' ' . $translator->translate('system.time.minutes');
            } else {
                return $hours . ' ' . $translator->translate('system.time.hours') . ' ' .
                    $minutes . ' ' . $translator->translate('system.time.minutes');
            }
        }
    }

    /**
     * @return string
     */
    public function getGuildName() {
        $this->loadGuild();

        if($this->guild == null) {
            return '';
        } else {
            return $this->guild->getName();
        }
    }

    /**
     * @return int
     */
    public function getGuildId() {
        $this->loadGuild();

        if($this->guild == null) {
            return 0;
        } else {
            return $this->guild->getId();
        }
    }

    /**
     * @return bool
     */
    public function hasGuild() {
        $this->loadGuild();

        return $this->guild != null;
    }

    /**
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level) {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getExp() {
        return $this->exp;
    }

    /**
     * @param int $exp
     */
    public function setExp($exp) {
        $this->exp = $exp;
    }

    /**
     * @return string
     */
    public function getExpFormatted() {
        return number_format($this->exp, 0,
            Core::getInstance()->getTranslator()->translate('system.number.dec'),
            Core::getInstance()->getTranslator()->translate('system.number.thousand'));
    }

    /**
     * @return int
     */
    public function getGold() {
        return $this->gold;
    }

    /**
     * @param int $gold
     */
    public function setGold($gold) {
        $this->gold = $gold;
    }

    /**
     * @return string
     */
    public function getGoldFormatted() {
        return number_format($this->gold, 0,
            Core::getInstance()->getTranslator()->translate('system.number.dec'),
            Core::getInstance()->getTranslator()->translate('system.number.thousand'));
    }

    /**
     * @return \DateTime
     */
    public function getLastPlay() {
        return $this->last_play;
    }

    /**
     * @param \DateTime $last_play
     */
    public function setLastPlay($last_play) {
        $this->last_play = $last_play;
    }

    /**
     * @return int
     */
    public function getAlignment() {
        return $this->alignment;
    }

    /**
     * @param int $alignment
     */
    public function setAlignment($alignment) {
        $this->alignment = $alignment;
    }

    /**
     * @return int
     */
    public function getEmpire() {
        $this->loadAccount();

        return $this->account->getEmpire();
    }

    /**
     * @return string
     */
    public function getEmpireDisplay() {
        return Core::getInstance()->getTranslator()->translate('system.empires.' . $this->getEmpire());
    }

    /**
     * @return string
     */
    public function getAlignmentHTML() {
        // todo read from settings (stored in database)
        $alignments = array(
            'system.align.chivalric' => array('min' => 12000, 'max' => 999999, 'color' => 'cyan'),
            'system.align.nobel' => array('min' => 8000, 'max' => 11999, 'color' => 'blue'),
            'system.align.good' => array('min' => 4000, 'max' => 7999, 'color' => 'blue'),
            'system.align.friendly' => array('min' => 1000, 'max' => 3999, 'color' => 'darkblue'),
            'system.align.neutral' => array('min' => 0, 'max' => 999, 'color' => 'black'),
            'system.align.aggressive' => array('min' => -1, 'max' => -3999, 'color' => 'brown'),
            'system.align.fraudulent' => array('min' => -4000, 'max' => -7999, 'color' => 'darkred'),
            'system.align.malicious' => array('min' => -8000, 'max' => -11999, 'color' => 'red'),
            'system.align.cruel' => array('min' => -12000, 'max' => -999999, 'color' => '#f00'),
        );

        $translator = Core::getInstance()->getTranslator();
        foreach($alignments as $name => $data) {
            if($data['min'] <= $this->alignment && $data['max'] > $this->alignment) {
                return '<span style="color: ' . $data['color'] . '; text-shadow: 1px 1px black">' .
                    $translator->translate($name) . '</span>';
            }
        }

        return ':( ' . $this->alignment;
    }

    /**
     * Lazy load the guild if not done before
     */
    private function loadGuild() {
        if($this->guild != null)
            return;

        $em = Core::getInstance()->getServerDatabase('player')->getEntityManager();
        // Get guild member entry
        /** @var $member GuildMember */
        $member = $em->getRepository('\\Quantum\\DBO\\GuildMember')->findOneBy(array(
            'pid' => $this->id
        ));

        if($member != null) {
            // Load guild entry
            /** @var $guild Guild */
            $this->guild = $em->getRepository('\\Quantum\\DBO\\Guild')->findOneBy(array(
                'id' => $member->getGuildId()
            ));
        }
    }

    /**
     * Lazy load the account if not done before
     */
    private function loadAccount() {
        if($this->account != null)
            return;

        $em = Core::getInstance()->getServerDatabase('account')->getEntityManager();
        $this->account = $em->getRepository('\\Quantum\\DBO\\Account')->findOneBy(array(
            'id' => $this->account_id
        ));
    }

    // TODO: fix
    public function format($value){

        $val = intval($value);

        return number_format($val, 0,
            Core::getInstance()->getTranslator()->translate('system.number.dec'),
            Core::getInstance()->getTranslator()->translate('system.number.thousand'));
    }

}