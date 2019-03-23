<?php

namespace ProposiDocs\Proposal\Storage\AWS;

use ProposiDocs\Proposal\Entity\ProposalEntity;
use ProposiDocs\Proposal\Storage\ProposalStorage;

class ProposalStorageAWS implements ProposalStorage {

    private $link;

	public function __construct() {
        $this->link = mysqli_connect('proposidocs-db-1.chon9cq0tcz8.us-east-1.rds.amazonaws.com', 'xinhus', 'wehacktogether');
        if (!$this->link) {
            throw new \Exception(mysqli_error($this->link));
        }
        mysqli_select_db($this->link, 'proposidocs');
    }

	public function insertProposal(ProposalEntity $entity): int {
        $insert = [
            'title' => $entity->getTitle(),
            'description' => $entity->getDescription(),
            'price' => $entity->getPrice(),
            'is_open' => $entity->isOpen() ? 1 : 0,
            'is_signed' => $entity->isSigned() ? 1 : 0,
            'is_declined' => $entity->isDeclined() ? 1 : 0
        ];
		$values = array_values($insert);
		$keys = array_keys($insert);
		try{
			$r = mysqli_query($this->link, 'INSERT INTO `proposals` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
		} catch (\Throwable $e) {
			var_dump($e->getMessage());
			die();
		}
		return mysqli_insert_id($this->link);
	}

	public function getAll(): array {
		$rs = mysqli_query($this->link, 'SELECT * FROM `proposals`');

		$rows = mysqli_fetch_all($rs, MYSQLI_ASSOC);
		$result = [];
		foreach ($rows as $row) {
			$result[] = ProposalEntity::createFromArray($row);
		}
		return $result;
	}

	public function getProposal(int $proposalId): ProposalEntity {
		$str = 'SELECT * FROM `proposals` WHERE `id` = ' . $proposalId;
		$rs = mysqli_query($this->link, $str);
		if (!$rs) {
			throw new \LogicException('Proposal with id not found');
		}
		$data = mysqli_fetch_assoc($rs);
        return ProposalEntity::createFromArray($data);
	}

	public function updateProposal(ProposalEntity $entity): ProposalEntity {
		$isOpen = $entity->isOpen() ? 1 : 0;
		$isSigned = $entity->isSigned() ? 1 : 0;
		$isDeclined = $entity->isDeclined() ? 1 : 0;
		$sql = 'UPDATE `proposals` SET `title` = "'.$entity->getTitle().'", `description` = "'.$entity->getDescription().'", `price` = "'.$entity->getPrice().'", `is_open` = '. $isOpen .', `is_signed` = '. $isSigned .', `is_declined` = '. $isDeclined;
		$sql .=" WHERE id = {$entity->getId()}";
		mysqli_query($this->link, $sql);
		return $entity;
	}

	public function deleteProposal(ProposalEntity $entity): bool {
		return mysqli_query($this->link, 'DELETE FROM `proposals` WHERE `id` = ' . $entity->getId());
	}
}
