
SELECT U.`id` as id,`email`,`name`,`patronymic`,`surname`,`money`, count(`token`) as tokens
 FROM `user` as U LEFT JOIN `user_profile` as Up
 ON U.id=Up.user_id LEFT JOIN `user_token`as Ut
 ON Up.user_id=Ut.user_id WHERE `is_active`
 IN(SELECT `is_active` FROM `user` WHERE `is_active`=1 )  GROUP BY `id`