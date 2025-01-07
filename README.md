

## User Migrate Query
```sql
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_balance` bigint unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `company`, `state`, `email_verified_at`, `password`, `available_balance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'https://media.licdn.com/dms/image/v2/D5603AQHcqHLMUdp58A/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1687581522193?e=2147483647&v=beta&t=FdvkswfoFD6nDM1Ymtxd0m9rb1WTf21bVQYQYrcT-JU',	'Raisul Hridoy',	'raisul.riseuplabs@gmail.com',	'LSD Primer & Co.',	'Chittagong',	NULL,	'$2y$12$6fHyCkhxLnicdmoSOnNLE.JDdTIGBCK8T1qPqU/oY.FYL3RraIwNm',	67415252031,	NULL,	'2025-01-02 05:16:28',	'2025-01-07 04:57:46'),
(2,	'https://avatars.githubusercontent.com/u/49744087?v=4',	'Shadhin',	'shadhin@gmail.com',	'GanjaGuru Wellness Solutions',	'Rangpur',	NULL,	'$2y$12$YEjPcUGyl5UyyaZC3LB0YuFMqgfg2Y0mAJWlh./dv1mVI4Qj.A1QG',	57337713686,	NULL,	'2025-01-02 05:16:49',	'2025-01-07 04:58:17'),
(3,	'https://nasimredoy.xyz/wp-content/uploads/2021/08/Nasim-Redoy-Passport-main-copy.jpg',	'Nasim',	'nasim@gmail.com',	'Bangla Mal Ltd.',	'Rajshahi',	NULL,	'$2y$12$IsLRbWLnsCVPfInod3pryOw50OuohHGYyBO3zsbs6KxDHDe6lurIO',	56686651218,	NULL,	'2025-01-02 05:17:05',	'2025-01-07 04:58:01'),
(4,	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWY3Hvu3g-Z9xNH6aFxTjN_Fe08J6ez_z5gs0ic3sOYDPGnyp4JVOn_Y0EwOocHXA7C-c&usqp=CAU',	'Oshit',	'oshit@gmail.com',	'Oshit & Sons Drugs Ltd.',	'Chittagong',	NULL,	'$2y$12$46xnpTHnjfRqDDv4PumKo.CFxXfFsin2Ac6X.Ehw75vcFEoNxFD/.',	99265044926,	NULL,	'2025-01-02 05:17:24',	'2025-01-07 04:58:22'),
(5,	'https://media.licdn.com/dms/image/v2/D5603AQEZwh4CqO7ogA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1732985610283?e=2147483647&v=beta&t=BooAccWuViABKdO3HIuAHDO1g21rv9BS4QBHWcSDyrw',	'Rakib',	'rakib@gmail.com',	'Rakib Biri & Co.',	'Khulna',	NULL,	'$2y$12$U4WKepAOrhi1XIbfZD0hnOYtlDEPBMFB2EkrpKeTL9A8NMuv1/XYC',	11354717573,	NULL,	'2025-01-02 05:49:54',	'2025-01-07 04:58:22'),
(6,	'https://lh3.googleusercontent.com/a-/ALV-UjUnIUt9JBCDGJ3N8Dq-s3Q8IIEnxSai9GcVUR6JeC98_-R6yCI=s80-p-k-rw-no',	'Mizan',	'mizan@gmail.com',	'Carew & Co.',	'Dhaka',	NULL,	'$2y$12$/M74YuPhUagGohA.JhKFruD/YibExEKYa1TgTg/IQzqWGB2GWRqEi',	22856757264,	NULL,	'2025-01-05 04:23:56',	'2025-01-07 04:58:06'),
(7,	'https://us04images.zoom.us/p/rEmak-CwSKSTmyLBYjyd5w/6c8a1242-c296-41b4-9dd4-bc8a65156f39-5456',	'Ridwan',	'ridwant@gmail.com',	'Ridwan Abashik Hotel & Resort',	'Dhaka',	NULL,	'$2y$12$a11..bmAj4qK9M3g2sfCUexGpBSjo3OdADnzd2aO6z6u29KGCP3xi',	14948877967,	NULL,	'2025-01-05 04:24:10',	'2025-01-07 04:57:56'),
(8,	'https://scontent.fdac24-3.fna.fbcdn.net/v/t39.30808-6/472669498_2381939445483466_1956807216083075368_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=a5f93a&_nc_ohc=9U-bZxXFF4MQ7kNvgF_qxhv&_nc_zt=23&_nc_ht=scontent.fdac24-3.fna&_nc_gid=AQnOYxyPskGX2qc2CgZ7Swz&oh=00_AYDTbQr-pIsgAfV0L4j0jUWfxnmu6wlBVg7BEk7wdxhVxA&oe=67815665',	'Eamin',	'eamin@gmail.com',	'Sobuj Shukh Enterprises',	'Dhaka',	NULL,	'$2y$12$3HUTDVX82cvrw/1mji5zr.4sbBDRk2ugGmQKPVjltnwxckOhgE5NG',	75141455262,	NULL,	'2025-01-05 21:18:18',	'2025-01-07 04:57:41'),
(9,	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-9cM_0AzfWFgOhWscd7z1NJpMqS5A7XVrlQ&s',	'Arafat',	'arafat@gmail.com',	'Sony Lighter Factory',	'Rajshahi',	NULL,	'$2y$12$6JRq5cijJ2WO3HtPV3ARwONFvWMbdBcs/xR7U.IOSz2aDd3M0b8bu',	36724078193,	NULL,	'2025-01-05 21:18:58',	'2025-01-07 04:58:06');
```