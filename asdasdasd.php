<?php
                                $stmt = $tag->read();

                                // put them in a select drop-down
                                echo "<select class='form-control' name='tag_id'>";

                                echo "<option>Please select...</option>";
                                while ($row_tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    extract($row_tag);

                                    // current category of the book must be selected
                                    if ($book->tag_id == $id) {
                                        echo "<option value='$id' selected>";
                                    } else {
                                        echo "<option value='$id'>";
                                    }

                                    echo "$tag</option>";
                                }
                                echo "</select>";
