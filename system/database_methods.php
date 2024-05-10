<?php
  function getEntry($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT id, title_de, date, cover, category, story 
              FROM Blog 
              WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $entry = array();
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $entryID = $row['id'];
        $entryTitle = $row['title_de'];
        $entryDate = $row['date'];
        $entryCover = $row['cover'];
        $entryStory = $row['story'];
        $entryCategory = $row['category'];

        $entry = array($entryID, $entryTitle, $entryDate, $entryCover, $entryStory, $entryCategory);
    }
    return $entry;
  }

  function getChapters($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT id, chapter_title, content_text, image_path 
              FROM blog_content 
              WHERE blog_id = ? AND chapter_language = 'german'";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $chapters = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
      $id = $row['id'];
      $title = $row['chapter_title'];
      $text = $row['content_text'];
      $image = $row['image_path'];

      $chapters[] = array($id, $title, $text, $image);
    }
    return $chapters;
  }


  function getNextNotEmptyId($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.id > ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $nextID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $nextID = $row['id'];
    }
    return $nextID;
  }

  function getPreviousNotEmptyId($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.id < ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id 
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }
  

  function getNextId($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog
              WHERE Blog.id > ?
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $nextID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $nextID = $row['id'];
    }
    return $nextID;
  }

  function getPreviousId($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog 
              WHERE Blog.id < ?
              GROUP BY Blog.id 
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }
  
  function getNextNotEmptyIdByCategory($id, $entryCategory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.category = ? AND Blog.id > ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
     $statement = $pdo->prepare($query);
     $statement->bindParam(1, $entryCategory);
     $statement->bindParam(2, $id); 
     $statement->execute();

     $nextID = 0;
     if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
     $nextID = $row['id'];
     }
     return $nextID;
  }
  function getPreviousNotEmptyIdByCategory($id, $entryCategory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.category = ? AND Blog.id < ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id  
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryCategory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }

  function getNextIdByCategory($id, $entryCategory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog
              WHERE Blog.category = ? AND Blog.id > ? 
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryCategory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $nextID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $nextID = $row['id'];
    }
    return $nextID;
  }

  function getPreviousIdByCategory($id, $entryCategory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog
              WHERE Blog.category = ? AND Blog.id < ?
              GROUP BY Blog.id  
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryCategory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }

  function getNextNotEmptyIdByStory($id, $entryStory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.story = ? AND Blog.id > ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryStory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $nextID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $nextID = $row['id'];
    }
    return $nextID;
  }

  function getPreviousNotEmptyIdByStory($id, $entryStory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, blog_content.id AS 'empty'
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              WHERE Blog.story = ? AND Blog.id < ? AND blog_content.id IS NOT NULL 
              GROUP BY Blog.id 
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryStory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }

  function getNextIdByStory($id, $entryStory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog
              WHERE Blog.story = ? AND Blog.id > ?
              GROUP BY Blog.id 
              ORDER BY Blog.id ASC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryStory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $nextID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $nextID = $row['id'];
    }
    return $nextID;
  }

  function getPreviousIdByStory($id, $entryStory, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id
              FROM Blog
              WHERE Blog.story = ? AND Blog.id < ?
              GROUP BY Blog.id 
              ORDER BY Blog.id DESC LIMIT 1";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $entryStory);
    $statement->bindParam(2, $id); 
    $statement->execute();

    $previousID = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $previousID = $row['id'];
    }
    return $previousID;
  }

  function deleteChapterById($id, $chapter, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "DELETE 
              FROM blog_content 
              WHERE id = ? AND blog_id = ?";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $chapter);
    $statement->bindParam(2, $id);
    $statement->execute();
  }

  function deleteEntryById($id, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "DELETE 
              FROM Blog 
              WHERE id = ?";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id);
    $statement->execute();
  }

  function insertChapter($id, $title, $text, $language, $imageData, $targetFileName, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "INSERT INTO blog_content (blog_id, chapter_title, content_text, chapter_language, image, image_path) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $id);
    $statement->bindParam(2, $title);
    $statement->bindParam(3, $text);
    $statement->bindParam(4, $language);
    $statement->bindParam(5, $imageData, PDO::PARAM_LOB);
    $statement->bindParam(6, $targetFileName);
    $statement->execute();
  }

  function insertEntry($headline_de, $headline_en, $category, $story, $coverData, $targetFileName, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "INSERT INTO Blog (title_de, title_en, category, story, image, cover,  date) 
              VALUES (?, ?, ?, ?, ?, ?, CURDATE())";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $headline_de);
    $statement->bindParam(2, $headline_en);
    $statement->bindParam(3, $category);
    $statement->bindParam(4, $story);
    $statement->bindParam(5, $coverData, PDO::PARAM_LOB);
    $statement->bindParam(6, $targetFileName);
    $statement->execute();
  }

  function getSubscribers($pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT * FROM newsletter";
    $statement = $pdo->prepare($query);
    $statement->execute();

    $subscribers = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $subscriberID = $row['id'];
      $subscriberName = $row['name'];
      $SubscriberEmail = $row['email'];
      $SubscriberDate = $row['subscribed_date'];

      $subscribers[] = array($subscriberID, $subscriberName, $SubscriberEmail, $SubscriberDate);
    }
    return $subscribers;
  }

  function checkEmail($email, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT * 
              FROM newsletter 
              WHERE email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    $available = true;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $available = false;
    }
    return $available;
  }

  function insertSubscriber($email, $name, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "INSERT INTO newsletter (email, name) 
              VALUES (:email, :name)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
  }

  function deleteSubscriber($id, $date, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "DELETE FROM newsletter 
              WHERE id = :id AND subscribed_date = :date";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->execute();
  }

  function getEntries($pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT Blog.id, Blog.title_de, Blog.date, Blog.cover, Blog.category, blog_content.id AS 'empty', Blog.story
              FROM Blog LEFT JOIN blog_content ON Blog.id = blog_content.blog_id 
              GROUP BY Blog.id";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $entries = array();

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
      $entryID = $row['id'];
      $entryTitle = $row['title_de'];
      $entryDate = $row['date'];
      $entryCover = $row['cover'];
      $Category = $row['category'];
      $entryStory = $row['story'];
      $empty = true;
      if($row['empty'] != NULL){
        $empty = false;
      }
      $entries[] = array($entryID, $entryTitle, $entryDate, $entryCover, $Category, $empty, $entryStory);
    }
    return $entries;
  }
  
  function countSubscribers($pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT COUNT(id) as countNewsletter 
              FROM newsletter ";
    $statement = $pdo->prepare($query);
    $statement->execute();

    $countNewsletter = 0;
    if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $countNewsletter = $row['countNewsletter'];
    }
    return $countNewsletter;
  }

  function searchEntries($search, $pdo = null, $statement = null){
    if ($pdo === null){
      global $pdo; 
    }
    if ($statement === null){
        global $statement;
    }
    $query = "SELECT id, title_de, title_en, date, cover, category, story 
              FROM Blog 
              WHERE title_de LIKE '%$search%' OR title_en LIKE '%$search%' OR story LIKE '%$search%' OR category LIKE '%$search%'";
    $statement = $pdo->prepare($query);
    $statement->execute();

    $entries = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $entryID = $row['id'];
        $entryTitle = $row['title_de'];
        $entryDate = $row['date'];
        $entryCover = $row['cover'];
        $Category = $row['category'];
        $entryStory = $row['story'];

        $entries[] = array($entryID, $entryTitle, $entryDate, $entryCover, $Category, $entryStory);
    }
    return $entries;
  }
?>