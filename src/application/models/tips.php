<?php
/**
 * Tip Model class
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Pingo - CI
 */

class Tips extends PingoModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'tips';
    }

    public function createTip(array $data)
    {
        return $this->create($data);
    }

    public function getAllTipsToday()
    {
    /* 	"SELECT tips.*, email FROM tips
                    INNER JOIN users ON tips.user_id = users.id
                    WHERE create_time >= CURDATE()
                    ORDER BY create_time DESC"; */
    	
        $sql = "SELECT tips.*,email,avatar,fullname FROM tips
        		INNER JOIN users ON tips.user_id = users.id
        		WHERE create_time >=CURDATE()
        		ORDER BY create_time DESC";
        return $this->db->query($sql)->result_array();
        
    }
    public function getAllTipsByUser($userId)
    {
    	$sql = "SELECT tips.*,email,avatar,fullname FROM tips 
    			INNER JOIN users ON tips.user_id = users.id
    			WHERE user_id=".$userId."
    			ORDER BY create_time DESC";
    	return $this->db->query($sql)->result_array();
    	
    }
 	public function getAllTipsTodayWithLike()
 	{
 		$sql ="SELECT tips.*, email, COUNT(user_like.tip_id) as like_number FROM tips 
 				INNER JOIN users ON tips.user_id = users.id
 				LEFT JOIN user_like ON tips.id =user_like.tip_id
 				WHERE create_time >= CURDATE()
 				GROUP BY tips.id
 				ORDER BY like_number DESC";
 		$tips = $this->db->query($sql)->result_array();
 		return $tips;
 	}
 	public function getAllTipsWithLike()
 	{
 		$sql ="SELECT tips.*, email, COUNT(user_like.tip_id) as like_number FROM tips
 				INNER JOIN users ON tips.user_id = users.id
 				LEFT JOIN user_like ON tips.id =user_like.tip_id
 				GROUP BY tips.id
 				ORDER BY like_number DESC";
 		$tips = $this->db->query($sql)->result_array();
 		return $tips;
 	}
 	public function getAllTipsWithLikeByUser($userId)
 	{
 		$sql ="SELECT tips.*, email, COUNT(user_like.tip_id) as like_number FROM tips
 				INNER JOIN users ON tips.user_id = users.id
 				LEFT JOIN user_like ON tips.id =user_like.tip_id
 				WHERE tips.user_id = ".$userId."
 				GROUP BY tips.id
 				ORDER BY like_number DESC";
 		$tips = $this->db->query($sql)->result_array();
 		return $tips;
 	}
 	public function getLimitedTipsWithLike(array $allTips,$limit,$start)
 	{
 		$limit=$start+$limit;
 		for ($i=$start;$i<$limit;$i++){
 			$limitedTips[]=$allTips[$i];
 		}
//  		var_dump($allTips);
//  		var_dump($limitedTips);
//  		die();
 		return $limitedTips;
 	}
 	
 	public function caculateLikeNumber($tipId)
 	{
 		$sql ="SELECT COUNT(*) as like_number FROM user_like WHERE tip_id = ?";
 		$rows = $this->db->query($sql,$tipId)->result_array();
 		return $rows[0]['like_number'];
 	}
 	
 	public function isUserLikedTip($userId,$tipId)
 	{
 		$sql="SELECT COUNT(*) as like_number FROM user_like WHERE tip_id =? and user_id = ?";
 		$rows = $this->db->query($sql,array($tipId,$userId))->result_array();
 		return $rows[0]['like_number'] > 0;
 	}
}
?>