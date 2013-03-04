<?php
class ProjectTest extends CDbTestCase
{
	public $fixtures = array(
			'projects' => 'Project'
		);

	public function testCRUD()
	{
		//Create a new project
		$newProject = new Project;
		$newProjectNane = 'Test Project 1';
		$newProject->setAttributes(
			array(
					'name'           => $newProjectNane,
					'description'    => 'Test project number one',
					'create_time'    => '2013-03-04 00:00:00',
					'create_user_id' => 1,
					'update_time'    => '2013-03-04 00:00:00',
					'update_user_id' => 1,
				)
			);
		$this->assertTrue($newProject->save(false));

		//Read back the newly created project
		$retrievedProject = Project::model()->findByPk($newProject->id);
		$this->assertTrue($retrievedProject instanceof Project);
		$this->assertEquals($newProjectNane, $retrievedProject->name);

		//Update the newly created project
		$updatedProjectName = 'Updated Test Project 1';
		$newProject->name = $updatedProjectName;
		$this->assertTrue($newProject->save(false));

		//Read back the record again to ensure the update worked
		$updatedProject = Project::model()->findByPk($newProject->id);
		$this->assertTrue($updatedProject instanceof Project);
		$this->assertEquals($updatedProjectName,$updatedProject->name);

		//Delete the project
		$newProjectID = $newProject->id;
		$this->assertTrue($newProject->delete());
		$deletedProject = Project::model()->findByPk($newProjectID);
		$this->assertEquals(NULL, $deletedProject);
	}
}