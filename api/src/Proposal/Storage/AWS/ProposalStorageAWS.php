<?php

namespace ProposiDocs\Proposal\Storage\AWS;

use ProposiDocs\Proposal\Entity\ProposalEntity;
use ProposiDocs\Proposal\Storage\ProposalStorage;

class ProposalStorageAWS implements ProposalStorage {

    private $link;

	public function __contruct() {
        $this->link = mysqli_connect('proposidocs-db-1.chon9cq0tcz8.us-east-1.rds.amazonaws.com', 'xinhus', 'wehacktogether');
        if (!$this->link) {
            throw new \Exception(mysqli_error($link));
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
        $values = array_map('mysql_real_escape_string', array_values($insert));
        $keys = array_keys($insert);
            
        mysqli_query($this->link, 'INSERT INTO `proposals` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
        return mysqli_insert_id($this->link);
	}

	public function getAll(): array {
        $rs = mysqli_query($this->link, 'SELECT * FROM `proposals`');
        
        return mysqli_fetch_all($rs);
	}

	public function getProposal(int $proposalId): array {
        $rs = mysqli_query($this->link, 'SELECT * FROM `proposals` WHERE `id` = ' . $proposalId);
		if (!$rs) {
			throw new \LogicException('Proposal with id not found');
		}
        return mysql_fetch_assoc($rs);
	}

	public function updateProposal(ProposalEntity $entity): ProposalEntity {
		$sql = 'UPDATE `proposals` SET `title` = "'.$entity->getTitle().'", `description` = "'.$entity->getDescription().'", `price` = "'.$entity->getPrice().'", `is_opened` = '.$entity->isOpen().', `is_signed` = '.$entity->isSigned().', `is_declined` = '.$entity->isDeclined();
		return mysqli_query($this->link, $sql);
	}

	public function deleteProposal(ProposalEntity $entity): bool {
		return mysqli_query($this->link, 'DELETE FROM `proposals` WHERE `id` = ' . $entity->getId());
	}
}
