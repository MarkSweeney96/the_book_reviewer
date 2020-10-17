-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2018 at 10:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(5) NOT NULL,
  `author_img` varchar(225) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_img`, `first_name`, `last_name`) VALUES
(1, 'https://images-na.ssl-images-amazon.com/images/I/511ElbuMK5L._UX250_.jpg', 'John', 'Green'),
(2, 'https://images-na.ssl-images-amazon.com/images/I/A1P6LpDuHQL._UX250_.jpg', 'J.K.', 'Rowling'),
(3, 'https://images-na.ssl-images-amazon.com/images/I/9132UvcXnGL._UX250_.jpg', 'Ernest', 'Cline'),
(4, 'https://images-na.ssl-images-amazon.com/images/I/31DNpF7xNuL._UX250_.jpg', 'Charles', 'Duhigg'),
(5, 'https://images-na.ssl-images-amazon.com/images/I/61l2IcBg9IL._UX250_.jpg', 'Jojo', 'Moyes'),
(7, 'https://images-na.ssl-images-amazon.com/images/I/51rdxFJKaGL._UX250_.jpg', 'Paula', 'Hawkins'),
(9, 'https://images-na.ssl-images-amazon.com/images/I/51wfoO7KeZL._UX250_.jpg', 'George R. R.', 'Martin'),
(10, 'https://images-na.ssl-images-amazon.com/images/I/A1sOThWQLuL._UX250_.jpg', 'Jamie', 'Oliver');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(4) NOT NULL,
  `cover_img` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `author_id` int(4) NOT NULL,
  `genre_id` int(4) NOT NULL,
  `review` text NOT NULL,
  `publish_date` varchar(10) NOT NULL,
  `num_pages` int(5) NOT NULL,
  `hours_to_read` varchar(10) NOT NULL,
  `total_words` varchar(9) NOT NULL,
  `star_rating` int(1) NOT NULL,
  `isbn` int(11) NOT NULL,
  `price` double NOT NULL,
  `publisher_id` int(4) NOT NULL,
  `amazon` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover_img`, `title`, `author_id`, `genre_id`, `review`, `publish_date`, `num_pages`, `hours_to_read`, `total_words`, `star_rating`, `isbn`, `price`, `publisher_id`, `amazon`) VALUES
(1, 'https://kbimages1-a.akamaihd.net/048fb49d-ec73-40e8-903d-e1216cb5bd9c/353/569/90/False/turtles-all-the-way-down-2.jpg', 'Turtles All the Way Down', 1, 1, 'Sixteen-year-old Aza never intended to pursue the mystery of fugitive billionaire Russell Pickett, but there\'s a hundred thousand dollar reward at stake and her Best and Most Fearless Friend, Daisy, is eager to investigate. So together, they navigate the short distance and broad divides that separate them from Russell Pickett\'s son, Davis.\r\n\r\nAza is trying. She is trying to be a good daughter, a good friend, a good student, and maybe even a good detective, while also living within the ever-tightening spiral of her own thoughts.\r\n\r\nIn his long-awaited return, John Green, the acclaimed, award-winning author of Looking for Alaska and The Fault in Our Stars, shares Aza\'s story with shattering, unflinching clarity in this brilliant novel of love, resilience, and the power of lifelong friendship.', '2017-10-05', 304, '4-5', '64k', 5, 525555366, 7.99, 1, 'https://www.amazon.co.uk/Turtles-All-Down-John-Green/dp/0241335434'),
(2, 'https://kbimages1-a.akamaihd.net/b5b48fcb-44d3-4279-8735-a38df4f2ce4d/353/569/90/False/looking-for-alaska.jpg', 'Looking for Alaska', 1, 1, 'Before. Miles \"Pudge\" Halter is done with his safe life at home. His whole life has been one big non-event, and his obsession with famous last words has only made him crave \"the Great Perhaps\" even more (Francois Rabelais, poet). He heads off to the sometimes crazy and anything-but-boring world of Culver Creek Boarding School, and his life becomes the opposite of safe. Because down the hall is Alaska Young. The gorgeous, clever, funny, sexy, self-destructive, screwed up, and utterly fascinating Alaska Young. She is an event unto herself. She pulls Pudge into her world, launches him into the Great Perhaps, and steals his heart. Then. . . .\r\n\r\nAfter. Nothing is ever the same.', '2016-10-23', 221, '5-6', '70k', 5, 142402516, 7.99, 1, 'https://www.amazon.co.uk/Looking-Alaska-John-Green/dp/0007523165/ref=sr_1_1?s=books&ie=UTF8&qid=1519391886&sr=1-1&keywords=looking+for+alaska+john+green'),
(3, 'https://kbimages1-a.akamaihd.net/c9f65a3a-7891-4fa8-b3bb-a59cc84d05c4/353/569/90/False/paper-towns.jpg', 'Paper Towns', 1, 1, 'Paper Towns is a fantastic, interesting and unique novel that I thoroughly enjoyed.\r\nI was very eager to read this following how much I loved An Abundance of Katherines, and I decided that I had to read it before I saw the film due to my golden rule: read the book before you watch the film. And this book did not disappoint...\r\nOur protagonist is Quentin \'Q\' Jacobsen, whose boring life is turned upside down when the stunning Margo Roth Spiegelman moves in next door. To the young Q, Margo is an adventure. It\'s all fun and games until one day Margo and Q come across a dead body.\r\nYears later, our two main characters are in high school and have drifted apart. They hardly speak until Margo climbs into Q\'s bedroom and invites him to join her on a mission of revenge. They have their night of adventure, but when Q wakes up in the morning, Margo has vanished. The main plot follows Q and his friends as they try to uncover the cryptic clues Margo left behind...\r\nThis is a very cleverly written plot. The trail of clues gives the book a driving force, something that makes you want to read on. It balances the comedy and the diary-like stories with the mystery brilliantly, by mixing them together. The two are inseparable. \r\nMy favourite element of the plot is the three sections. The book is split into three parts, namely The Strings, The Grass and The Vessel. These represent the three metaphors used throughout the book. Each section focuses on one of the metaphors, and it is mentioned in a number of forms. It also sets the atmosphere for each section: The Strings is about breaking, and irreversible change; The Grass is about friends, family and memories; The Vessel is about journeys and final destinations. This was a very clever move that I haven\'t seen in a YA novel before.\r\nIn my opinion, the best thing about this book was the discussion of identity. The book focuses on each character\'s different idea of Margo, and eventually their realisations that she is just a person like them. There is so much I could say about the importance of the ideals in this book. The metaphors are beautiful, and really interesting. There are some gorgeous phrases that I would love to steal for my own writing. To give you a taster, my favourite quote is this...\"It is easy to forget how full the world is of people, full to bursting, and each of them imaginable and constantly misimagined.\"\r\nJohn Green has done a remarkable job at balancing the metaphors and philosophical discussions with developed characters and some really funny comedy. Q is relatable as our main character, a teenager who is at a bit of a lost point in his life. He does what most people would do in his situation, and is interesting without being precocious or cringe-worthy. His speeches are really well-written, and reveal a lot about his personality.\r\nQ\'s best friend Ben was a character I disliked throughout the most part of the book, with his derogatory language and backstabbing personality. However, I think he added drama to the plot, and most readers can relate to having a friend like him. I really liked the character of Radar, Q\'s other best friend who is more intellectual and into posting on a site meant to be a parody of Wikipedia. In the second half of the book, we get to know Lacey, a former popular person and enemy of the three boys who befriends them and helps in the quest to find Margo. She was a character who I grew to like gradually, but by the end of the book I could see how necessary she was to solving the mystery.\r\nThroughout most of the book, Margo is more of an idea than a character. Everybody has different memories of her, and so sees her differently. Q\'s idea of Margo evolves through the story, and her character becomes steadily more complex. Even when we discover the real Margo, she is still one of the most complicated characters in YA.\r\nPaper Towns was one of the funniest books I have come across in ages. There is ongoing snarky wit in the first two parts, mainly coming through Q\'s reactions to the strange things Margo seems to have done. A lot of comic relief also comes through Ben, particularly when he is drunk. Despite this, in my opinion, the funniest part of the book was the road trip towards the end. I won\'t spoil it, but it is crazily random and had me actually laughing out loud. Not only this, but the book almost has its own language of inside jokes: Black Santas, catfish and beer swords are all involved.\r\nIf I had to find a criticism for this book (a hard feat), I would say the plot starts to drag slightly in the middle. There is a period where the clues all slow down a bit, and the humour is lost. That said, it picks up again with a major discovery.\r\nThe ending of this book will break your heart. It\'s sad, but it feels right given the rest of the story. Everything is pulled together. I loved how the metaphors recur throughout the story, making everything flow together.\r\nI\'ve recently been thinking that all John Green books seem to have a common language. I smiled every time I saw references to his other books. For example, the three metaphors and the famous \'It\'s a metaphor,\' from TFIOS, and the road trip and Katherines.\r\nI could go on and on about this book, but I\'ll stop there. To conclude, Paper Towns is a remarkable and funny book with great characters and beautiful metaphors. I would recommend it to fans of any other John Green book, or fans of any similar YA authors, such as Rainbow Rowell. But to be honest, I think anyone and everyone could gain something from reading this.', '2009-09-22', 305, '6-7', '83k', 4, 14241493, 8.99, 1, 'https://www.amazon.co.uk/Paper-Towns-John-Green/dp/1408867842/ref=sr_1_1?s=books&ie=UTF8&qid=1519391929&sr=1-1&keywords=paper+towns'),
(4, 'https://kbimages1-a.akamaihd.net/35ca4934-c35d-4391-968b-20feac662081/353/569/90/False/ready-player-one-2.jpg', 'Ready Player One', 3, 4, 'Sixteen-year-old Aza never intended to pursue the mystery of fugitive billionaire Russell Pickett, but there\'s a hundred thousand dollar reward at stake and her Best and Most Fearless Friend, Daisy, is eager to investigate. So together, they navigate the short distance and broad divides that separate them from Russell Pickett\'s son, Davis.\r\n\r\nAza is trying. She is trying to be a good daughter, a good friend, a good student, and maybe even a good detective, while also living within the ever-tightening spiral of her own thoughts.\r\n\r\nIn his long-awaited return, John Green, the acclaimed, award-winning author of Looking for Alaska and The Fault in Our Stars, shares Aza\'s story with shattering, unflinching clarity in this brilliant novel of love, resilience, and the power of lifelong friendship.', '2011-08-06', 386, '11-12', '141k', 5, 2123456803, 8.99, 2, 'https://www.amazon.co.uk/Ready-Player-One-Ernest-Cline/dp/0099560437/ref=sr_1_1?s=books&ie=UTF8&qid=1519391947&sr=1-1&keywords=ready+player+one'),
(5, 'https://kbimages1-a.akamaihd.net/9ff9240f-56db-47ad-8cf1-773267413238/353/569/90/False/armada-8.jpg', 'Armada', 3, 4, 'It\'s just another day of high school for Zack Lightman. He\'s daydreaming through another boring math class, with just one more month to go until graduation and freedom-if he can make it that long without getting suspended again.\r\n\r\nThen he glances out his classroom window and spots the flying saucer.\r\n\r\nAt first, Zack thinks he\'s going crazy.\r\n\r\nA minute later, he\'s sure of it. Because the UFO he\'s staring at is straight out of the videogame he plays every night, a hugely popular online flight simulator called *Armada-*in which gamers just happen to be protecting the earth from alien invaders.\r\n\r\nBut what Zack\'s seeing is all too real. And his skills-as well as those of millions of gamers across the world-are going to be needed to save the earth from what\'s about to befall it.\r\n\r\nYet even as he and his new comrades scramble to prepare for the alien onslaught, Zack can\'t help thinking of all the science-fiction books, TV shows, and movies he grew up reading and watching, and wonder: Doesn\'t something about this scenario seem a little too... familiar?\r\n\r\nArmada is at once a rollicking, surprising thriller, a classic coming of age adventure, and an alien-invasion tale like nothing you\'ve ever read before-one whose every page is infused with author Ernest Cline\'s trademark pop-culture savvy.', '2015-05-14', 411, '8-9', '112k', 4, 978123456, 6.99, 2, 'https://www.amazon.co.uk/Armada-Ernest-Cline/dp/0099586746/ref=pd_bxgy_14_img_3?_encoding=UTF8&psc=1&refRID=042N5W0H5PBZQBVCRAJJ'),
(6, 'https://kbimages1-a.akamaihd.net/e04cb5d7-ca4f-4338-8548-df74e926f906/353/569/90/False/the-power-of-habit-2.jpg', 'The Power of Habit', 4, 2, 'In The Power of Habit, award-winning New York Times business reporter Charles Duhigg takes us to the thrilling edge of scientific discoveries that explain why habits exist and how they can be changed. With penetrating intelligence and an ability to distill vast amounts of information into engrossing narratives, Duhigg brings to life a whole new understanding of human nature and its potential for transformation.\r\n\r\nAlong the way we learn why some people and companies struggle to change, despite years of trying, while others seem to remake themselves overnight. We visit laboratories where neuroscientists explore how habits work and where, exactly, they reside in our brains. We discover how the right habits were crucial to the success of Olympic swimmer Michael Phelps, Starbucks CEO Howard Schultz, and civil-rights hero Martin Luther King, Jr. We go inside Procter & Gamble, Target superstores, Rick Warren\'s Saddleback Church, NFL locker rooms, and the nation\'s largest hospitals and see how implementing so-called keystone habits can earn billions and mean the difference between failure and success, life and death.\r\n\r\nAt its core, The Power of Habit contains an exhilarating argument: The key to exercising regularly, losing weight, raising exceptional children, becoming more productive, building revolutionary companies and social movements, and achieving success is understanding how habits work.\r\n\r\nHabits aren\'t destiny. As Charles Duhigg shows, by harnessing this new science, we can transform our businesses, our communities, and our lives.', '2013-02-07', 444, '9-10', '121k', 4, 1847946240, 7.99, 3, 'https://www.amazon.co.uk/Power-Habit-Why-What-Change/dp/1847946240/ref=sr_1_1?s=books&ie=UTF8&qid=1519391975&sr=1-1&keywords=the+power+of+habbit'),
(7, 'https://kbimages1-a.akamaihd.net/a4d81da0-36d6-4443-9bac-c5ef1f24da92/353/569/90/False/still-me-2.jpg', 'Still Me', 5, 3, 'THE NO. 1 SUNDAY TIMES BESTSELLER\r\n\r\nLOU CLARK IS BACK in the BRAND NEW Jojo Moyes novel Still Me, follow-up to the Number One international bestsellers Me Before You and After You.\r\n\r\nLou Clark knows too many things . . .\r\n\r\nShe knows how many miles lie between her new home in New York and her new boyfriend Sam in London.\r\n\r\nShe knows her employer is a good man and she knows his wife is keeping a secret from him.\r\n\r\nWhat Lou doesn\'t know is she\'s about to meet someone who\'s going to turn her whole life upside down.\r\n\r\nBecause Josh will remind her so much of a man she used to know that it\'ll hurt.\r\n\r\nLou won\'t know what to do next, but she knows that whatever she chooses is going to change everything.\r\n\r\n\'A triumph\' Heat\r\n\r\n\'A joyful story with a pitch-perfect ending\' Daily Express\r\n\r\n\'Still one of our fave authors and still a brilliant read!\' Look\r\n\r\n\'Immensely enjoyable\' Sunday Times\r\n\r\n\'Louisa is a dream character, and this is going to be huge - deservedly so\' Daily Mail\r\n\r\n\'Captivating\' OK!\r\n\r\n\'A funny, thoughtful and uplifting conclusion to the trilogy\' Sunday Express', '2018-01-25', 517, '11-12', '141k', 3, 718183185, 11.99, 3, 'https://www.amazon.co.uk/Still-Me-Sunday-Times-Bestseller/dp/0718183185/ref=sr_1_1?s=books&ie=UTF8&qid=1519391987&sr=1-1&keywords=still+me'),
(8, 'https://kbimages1-a.akamaihd.net/8b22e6fb-e8f1-4731-9389-4777b7cb867c/353/569/90/False/harry-potter-and-the-philosopher-s-stone-3.jpg', 'Harry Potter and the Philosopher\'s Stone', 2, 5, '\"Turning the envelope over, his hand trembling, Harry saw a purple wax seal bearing a coat of arms; a lion, an eagle, a badger and a snake surrounding a large letter \'H\'.\"\r\n\r\nHarry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!', '1997-06-26', 295, '6-7', '80k', 4, 1408865270, 8.99, 4, 'https://www.amazon.co.uk/Harry-Potter-Philosophers-Stone/dp/1408855658/ref=sr_1_1?s=books&ie=UTF8&qid=1519392004&sr=1-1&keywords=harry+potter+and+the+philosophers+stone+book'),
(9, 'https://kbimages1-a.akamaihd.net/0a618e19-28de-4b8f-9d90-408fe45e7e37/353/569/90/False/harry-potter-and-the-chamber-of-secrets-5.jpg', 'Harry Potter and the Chamber of Secrets', 2, 5, '\"\'There is a plot, Harry Potter. A plot to make most terrible things happen at Hogwarts School of Witchcraft and Wizardry this year.\'\"\r\n\r\nHarry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start. Students are found as though turned to stone... Dobby\'s sinister predictions seem to be coming true.', '1998-07-02', 372, '6-7', '89k', 4, 1408855666, 8.99, 4, 'https://www.amazon.co.uk/Harry-Potter-Chamber-Secrets/dp/1408855666/ref=sr_1_1?s=books&ie=UTF8&qid=1519392017&sr=1-1&keywords=harry+potter+and+the+chamber+of+secrets+book'),
(10, 'https://kbimages1-a.akamaihd.net/bd824ea7-6056-492f-a6c0-d05a81da8ffa/353/569/90/False/harry-potter-and-the-prisoner-of-azkaban-5.jpg', 'Harry Potter and the Prisoner of Azkaban', 2, 5, '\"\'Welcome to the Knight Bus, emergency transport for the stranded witch or wizard. Just stick out your wand hand, step on board and we can take you anywhere you want to go.\'\"\r\n\r\nWhen the Knight Bus crashes through the darkness and screeches to a halt in front of him, it\'s the start of another far from ordinary year at Hogwarts for Harry Potter. Sirius Black, escaped mass-murderer and follower of Lord Voldemort, is on the run - and they say he is coming after Harry. In his first ever Divination class, Professor Trelawney sees an omen of death in Harry\'s tea leaves... But perhaps most terrifying of all are the Dementors patrolling the school grounds, with their soul-sucking kiss...', '1999-07-08', 411, '8-9', '112k', 5, 1408855674, 9.99, 4, 'https://www.amazon.co.uk/Harry-Potter-Prisoner-Azkaban/dp/1408855674/ref=sr_1_1?s=books&ie=UTF8&qid=1519392034&sr=1-1&keywords=harry+potter+and+the+prisoner+of+azkaban+book'),
(11, 'https://images-na.ssl-images-amazon.com/images/I/8183Y1myPvL.jpg', 'The Girl On the Train', 7, 6, 'There\'s nothing new under the sun - or in the world of big-selling commercial fiction - but Paula Hawkins has come up with an ingenious slant on the currently fashionable amnesia thriller. The latest bestselling example is Emma Healey\'s Costa-winning debut Elizabeth Is Missing, featuring an elderly woman with dementia. The protagonist of The Girl on the Train is much younger, yet she is unable to remember much about the night a young woman went missing near her old home - blood, an underpass, a blue dress and a man with red hair keep jumbling in her mind.\r\n\r\nThe narrative is skilfully split between three women whose lives interlink tragically: Rachel, Megan and Anna. We first encounter Rachel on the commute home from London, just another tired worker on her way back to the suburbs - except that she has four cans of pre-mixed gin and tonic in her bag, and that\'s only for starters. \"It\'s Friday, so I don\'t have to feel guilty about drinking on the train. TGIF. The fun starts here.\"\r\n\r\nThe journey takes Rachel along the backs of houses on the street where she used to live. Unable to look at number 23, her old home, where ex-husband Tom now lives with new wife Anna, she focuses instead on number 15. She has become obsessed with the beautiful young couple living there, whom she names Jess and Jason. Rachel looks out for the pair every day, daydreaming about their perfect lives. Until one day she sees something that startles her in their garden, and when she reads in the paper that “Jess” – who is really called Megan – has vanished, she decides to tip off the police. She is convinced that “Jason”, now the prime suspect – and really called Scott – would never harm his beloved wife.\r\n\r\nBut Rachel is prone to blackouts, irrationality and drunk dialling, and the police dismiss her as a rubbernecker. She has also been persecuting Tom and Anna, bombarding them with offensive messages. It is a bold move to create such a flawed female lead; the alcoholic lifestyle with its miserable excuses, urine-soaked underwear and vomit on the stairs is outlined in all its bleak, cyclic predictability.\r\n\r\nRachel is not just weak, occasionally spiteful and self-pitying, but also overweight and relatively unattractive; a sad sack compared with vibrant Megan and glossy, sexy Anna, who glories in her victory over her predecessor. Yet as Hawkins demonstrates, apparently fixed identities and fortunes have their foundation on shifting sands. The more Rachel discovers about the missing Megan, the less she likes her. In a clear echo of Gone Girl (the success of which is presumably why this novel does not bear the more accurate title The Woman on the Train), Scott, the apparently grieving husband, is likewise more slippery than his charming manner indicates. Anna, too, comes to seem less like an innocent victim and more like a vindictive troublemaker. Tom is a nice guy driven to distraction by his batty ex-wife, but is there something disquieting lurking beneath his calm surface?\r\n\r\nHawkins juggles perspectives and timescales with great skill, and considerable suspense builds up along with empathy for an unusual central character who does not immediately grab the reader. “Ingenious” twists usually violate psychological plausibility, as in Gone Girl. Hawkins’s Girl is a less flashy, but altogether more solid creation.', '2016-08-25', 375, '9', '102k', 5, 591237891, 15.99, 1, 'https://www.amazon.com/Girl-Train-Movie-Tie/dp/0735212163'),
(12, 'https://images-na.ssl-images-amazon.com/images/I/518dkA0JEpL.jpg', 'A Game of Thrones', 9, 4, 'Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.\r\n\r\nA GAME OF THRONES\r\n\r\nLong ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens.\r\n\r\nHere an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.', '2003-01-01', 1091, '26', '297k', 4, 234567854, 22.99, 3, 'https://www.amazon.com/dp/B000QCS8TW/ref=chrt_bk_rd_fc_20_ci_lp');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(5) NOT NULL,
  `genre_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre_name`) VALUES
(1, 'Young Adult'),
(2, 'Self Help'),
(3, 'Romance'),
(4, 'Fantasy'),
(5, 'Childrens'),
(6, 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(5) NOT NULL,
  `pub_logo` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `website` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `pub_logo`, `name`, `address`, `phone`, `email`, `website`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/en/1/1c/Penguin_logo.svg', 'Penguin', '375 Hudson St, New York, NY 10014, USA', '+1 212-366-2000', 'enquiries@penguin.com', 'http://www.penguin.com/'),
(2, 'https://upload.wikimedia.org/wikipedia/commons/0/04/Broadwaybooks_logo.PNG', 'Broadway Books', '1714 NE Broadway St, Portland, OR 97232, USA', '+1 503-284-1726', 'enquiries@broadwaybooks.net', 'http://www.broadwaybooks.net'),
(3, 'https://penguinrandomhouse.ca/sites/all/themes/de_html5/images/logo-footer.svg', 'Penguin Random House', '1745 Broadway, New York, NY 10106, USA', '+1 212-782-9000', 'enquiries@penguinrandomhouse.com', 'https://www.penguinrandomhouse.com/'),
(4, 'https://fusiondigital.files.wordpress.com/2012/10/bloomsbury.png', 'Bloomsbury Publishing', '50 Bedford Square, Fitzrovia, London WC1B 3DP, UK', '+44-20-7631-5600', 'enquiries@bloomsbury.com', 'https://www.bloomsbury.com/uk/');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `description`) VALUES
(1, 'admin', 'System Administrator'),
(2, 'manager', 'Bookstore Manager'),
(3, 'user', 'Bookstore User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(3, 'admin', '$2y$10$ApoXT6.ZyjsBRrxsdMrJhe9Uzlk/zSpx/RSAPPUd11DJY7mSQDBtO', 1),
(4, 'manager', '$2y$10$r.FPnPn1og4renexQlJ.luON970StRtlCFZH1PzZw6MnxPvd7Gi.i', 2),
(5, 'joebloggs', '$2y$10$y83ArwmL.dyGOUw2tqQLmeWt4VotTosbIt.rFVNaNc0qNlEFqNzB2', 3),
(6, 'markswe', '$2y$10$6TRAgkWptVxFzK0eXl8Le.R3TF4WeWWIwTIdsdG1GofbYf2ChWfRS', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_table_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
