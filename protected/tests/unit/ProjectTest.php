<?php
class ProjectTest extends CDbTestCase
{
	public $fixtures = array(
			'projects' => 'Project'
		);

	public function testCreate()
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
	}
	public function testRead()
	{
		$retrievedProject = $this->projects('project1');
		$this->assertTrue($retrievedProject instanceof Project);
		$this->assertEquals('Test Project 1', $retrievedProject->name);
	}
	public function testUpdate()
	{
		//Update the newly created project
		$project = $this->projects('project2');
		$updatedProjectName = 'Updated Test Project 2';
		$project->name = $updatedProjectName;
		$this->assertTrue($project->save(false));

		//Read back the record again to ensure the update worked
		$updatedProject = Project::model()->findByPk($project->id);
		$this->assertTrue($updatedProject instanceof Project);
		$this->assertEquals($updatedProjectName,$updatedProject->name);
	}
	public function testDelete()
	{
		//Delete the project
		$project = $this->projects('project2');
		$newProjectID = $project->id;
		$this->assertTrue($project->delete());
		$deletedProject = Project::model()->findByPk($newProjectID);
		$this->assertEquals(NULL, $deletedProject);
	}

}